<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\TaskType;
use App\Entity\TaskAssignment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskSchedulerController extends AbstractController
{
    #[Route('/', name: 'app_task_list')]
    public function assignDailyTasks(EntityManagerInterface $em): Response
    {
        $today = new \DateTimeImmutable('today');

        $weekStart = $today->modify('monday this week')->setTime(0, 0, 0);
        $weekEnd = $today->modify('sunday this week')->setTime(23, 59, 59);

        $users = $em->getRepository(User::class)->findAll();
        $taskTypes = $em->getRepository(TaskType::class)->findAll();

        $todayAssignments = $em->getRepository(TaskAssignment::class)->findBy(['assignedDate' => $today]);
        $assignedUserIdsToday = [];
        foreach ($todayAssignments as $assignment) {
            $assignedUserIdsToday[] = $assignment->getUser()->getId();
        }

        $assignments = [];

        foreach ($taskTypes as $taskType) {

            $existingToday = $em->getRepository(TaskAssignment::class)->findOneBy([
                'taskType' => $taskType,
                'assignedDate' => $today,
            ]);

            if ($existingToday) {
                $assignments[] = $existingToday;
                continue;
            }

            $qb = $em->createQueryBuilder();
            $qb->select('ta')
                ->from(TaskAssignment::class, 'ta')
                ->where('ta.taskType = :taskType')
                ->andWhere('ta.assignedDate BETWEEN :weekStart AND :weekEnd')
                ->setParameter('taskType', $taskType)
                ->setParameter('weekStart', $weekStart)
                ->setParameter('weekEnd', $weekEnd);

            $weeklyAssignments = $qb->getQuery()->getResult();

            $assignedUserIdsThisWeek = [];
            foreach ($weeklyAssignments as $assignment) {
                $assignedUserIdsThisWeek[] = $assignment->getUser()->getId();
            }

            $availableUsers = array_filter($users, function ($user) use ($assignedUserIdsThisWeek, $assignedUserIdsToday) {
                $id = $user->getId();
                return !in_array($id, $assignedUserIdsThisWeek) && !in_array($id, $assignedUserIdsToday);
            });

            if (count($availableUsers) === 0) {
                $availableUsers = array_filter($users, function ($user) use ($assignedUserIdsToday) {
                    return !in_array($user->getId(), $assignedUserIdsToday);
                });

                if (count($availableUsers) === 0) {
                    $availableUsers = $users;
                }
            }

            $availableUsers = array_values($availableUsers);
            $randomIndex = random_int(0, count($availableUsers) - 1);
            $selectedUser = $availableUsers[$randomIndex];

            $newAssignment = new TaskAssignment();
            $newAssignment->setUser($selectedUser);
            $newAssignment->setTaskType($taskType);
            $newAssignment->setAssignedDate(\DateTime::createFromFormat('Y-m-d', $today->format('Y-m-d')));
            $newAssignment->setCreatedA(new \DateTime());

            $em->persist($newAssignment);
            $assignments[] = $newAssignment;

            $assignedUserIdsToday[] = $selectedUser->getId();
        }

        $em->flush();

        return $this->render('task/list.html.twig', [
            'assignments' => $assignments,
            'date' => $today->format('d.m.Y'),
        ]);
    }
}
