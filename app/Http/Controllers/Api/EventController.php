<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventStoreRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): JsonResponse
    {
        $events = Event::query()
            ->with('user', 'users')
            ->latest()
            ->get();

        return response()->json([
            'error' => null,
            'result' => $events
        ]);
    }

    public function store(EventStoreRequest $request): JsonResponse
    {

        $event = Event::create($request->validated());

        $event->users()->sync($request->input('users'));

        return response()->json([
            'error' => null,
            'result' => $event
        ]);
    }

    public function joinEvent(Event $event): JsonResponse
    {
        if (!$event->users->contains(auth()->id()) && $event->user_id !== auth()->id()) {
            $event->users()->attach(auth()->id());

            return response()->json([
                'error' => null,
                'result' => $event->load('user', 'users')
            ]);
        }

        return response()->json([
            'error' => 'Вы уже участвуете в данном событии'
        ]);
    }

    public function leaveEvent(Event $event): JsonResponse
    {
        if (auth()->id() !== $event->user_id) {
            if ($event->users->contains(auth()->id())) {

                $event->users()->detach(auth()->id());

                return response()->json([
                    'error' => null,
                    'result' => $event->load('user', 'users')
                ]);
            }
            return response()->json([
                'error' => 'Вы не состоите в данном Event, по этому не можете покинуть'
            ]);
        }

        return response()->json([
            'error' => 'Вы не можете покинуть событие, так как являетесь создателем данного ивента'
        ]);
    }

    public function delete(Event $event): JsonResponse
    {
        if ($event->user_id === auth()->id()) {
            $event->delete();

            return response()->json([
                'error' => null,
                'response' => 'success'
            ]);
        }

        return response()->json([
            'error' => 'Вы не можете удалить этот Event'
        ]);

    }
}
