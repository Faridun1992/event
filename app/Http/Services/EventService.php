<?php

namespace App\Http\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventService
{
    public function getAuthUsersEvents(): Collection
    {
        return Event::query()
            ->where(function ($query) {
                $query->where('owner_id', auth()->id())
                    ->orWhereRelation('users', 'user_id', auth()->id());
            })
            ->with('owner', 'users')
            ->latest()
            ->get();

    }

    public function getEventsWhereDoesntIncludeAuthUser(): Collection
    {
        return Event::query()
            ->whereNot(function ($query) {
                $query->where('owner_id', auth()->id())
                    ->orWhereRelation('users', 'user_id', auth()->id());
            })
            ->with('owner', 'users')
            ->latest()
            ->get();
    }

    public function getEvent(Collection $events, $id = null,)
    {
        $event = $events[0] ?? null;

        if ($id !== null) {
            $event = Event::find($id);
            abort_if($event === null, 404);
        }

        return $event;
    }
}
