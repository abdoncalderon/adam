<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\CommentNote;
use App\Models\Note;
use App\Http\Requests\Workbook\StoreCommentNoteRequest;
use App\Mail\CommentNoteCreated;
use App\Models\LocationProjectUser;
use Exception;
use Illuminate\Support\Facades\Mail;

class CommentNoteController extends Controller
{
    public function store(StoreCommentNoteRequest $request){
        try{
            $note=Note::find($request->note_id);
            $date = strtotime($note->folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $note->folio->location->max_time_create_comment)){
                $comment = CommentNote::create($request ->validated());
                $locationProjectUsersReceiveNotification = LocationProjectUser::where('location_id',$note->folio->location_id)->where('receive_notification',1)->get();
                foreach ($locationProjectUsersReceiveNotification as $locationProjectUser){
                    Mail::to($locationProjectUser->projectUser->user->email)->queue(new CommentNoteCreated($comment));
                }
                $note = Note::find($request->note_id);
                return redirect()->route('notes.show',$note);
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.comment'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(CommentNote $commentNote){
        $note = Note::find($commentNote->note_id);
        $commentNote->delete();
        return redirect()->route('notes.show',$note);
    }
}
