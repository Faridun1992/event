<?php

namespace App\Http\Controllers;

use App\Http\Services\EventService;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct(
        public EventService $service
    )
    {
    }

    public function index(Request $request): View
    {
        $authUserEvents = $this->service->getAuthUsersEvents();

        $allEvents = $this->service->getEventsWhereDoesntIncludeAuthUser();

        $event = $this->service->getEvent($allEvents, $request->query('id'));

        return view('events.events', compact('allEvents', 'authUserEvents', 'event'));
    }

    public function joinEvent(Event $event): RedirectResponse
    {
        $event->users()->attach(auth()->id());

        return back()->with('status', 'Вы успешно присоединились к Event');
    }

    public function leaveEvent(Event $event): RedirectResponse
    {
        $event->users()->detach(auth()->id());

        return back()->with('status', 'Вы успешно покинули Event');
    }
}
