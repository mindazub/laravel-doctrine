<?php

namespace TodoList\Http\Controllers;

use TodoList\Entities\Task;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class TaskController extends Controller
{
    public function getAdd()
    {
        return view('add');
    }

    public function postAdd(Request $request, EntityManagerInterface $em)
    {
        $task = new Task(
            $request->get('name'),
            $request->get('description')
        );

        $em->persist($task);
        $em->flush();

        return redirect('/tasks')->with('success_message', 'Task added successfully!');
    }

    public function getIndex(EntityManagerInterface $em)
    {
        $tasks = $em->getRepository(Task::class)->findAll();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function getToggle(EntityManagerInterface $em, $taskId)
    {
        /* @var Task $task */
        $task = $em->getRepository(Task::class)->find($taskId);

        $task->toggleStatus();
        $newStatus = ($task->isDone()) ? 'done' : 'not done';

        $em->flush();

        return redirect('/tasks')->with('success_message', 'Task successfully marked as ' . $newStatus);
    }

    public function getDelete(EntityManagerInterface $em, $taskId)
    {
        // dd('in');
        $task = $em->getRepository(Task::class)->find($taskId);
        // dd($task);

        $em->remove($task);
        $em->flush();

        // dd($task);

        return redirect('/tasks')->with('success_message', 'Task successfully removed.');
    }

    public function getEdit(EntityManagerInterface $em, $taskId)
    {
        $task = $em->getRepository(Task::class)->find($taskId);

        return view('edit', [
            'task' => $task
        ]);
    }

    public function postEdit(Request $request, EntityManagerInterface $em, $taskId)
    {
        /* @var Task $task */
        $task = $em->getRepository(Task::class)->find($taskId);

        $task->setName($request->get('name'));
        $task->setDescription($request->get('description'));

        $em->flush();

        return redirect('tasks')->with('success_message', 'Task modified successfully.');
    }



} // End of TaskController