<?php

namespace App\Http\Controllers\Organization\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Event,User};
use App\Services\EventService;

class EventSubscriptionController extends Controller
{
    public function store(Event $event, Request $request)
    {
        $user = User::findOrFail($request->user_id);

        //
        if(EventService::userSubscribeOnEvent($user,$event)){
            return back()->with('warning', 'Este participante já está inscrito');
        }

        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Operação inválida! O evento já ocorreu!');
        }

        if(EventService::eventParticipantsLimitHasReached($event)){
            return back()->with('warning', 'Não é possível inscrever o participante no evento pois o limite de participantes foi atingido. ');
        }


        $user->events()->attach($event->id);

        return back()->with('success', 'Inscrição no evento realizada com sucesso');

    }

    public function destroy(Event $event, User $user)
    {
        if(EventService::eventEndDateHasPassed($event)){
            return back()->with('warning', 'Operação inválida! o evento já ocorreu!');
        }
        if(!EventService::userSubscribeOnEvent($user,$event)){
            return back()->with('warning', 'O participante não etá inscrito no evento!');
        }

        $user->events()->detach($event->id);
        return back()->with('success', 'Inscrição no evento removida  com sucesso!');
    }
}
