<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use App\Models\AttachmentDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\Workbook\StoreAttachmentDailyReportRequest;
use Exception;

class AttachmentDailyReportController extends Controller
{
    public function store(StoreAttachmentDailyReportRequest $request){
        try{
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/documents/agreement/dailyreports/attachments/',$filename);
                $request ->validated();
                AttachmentDailyReport::create([
                    'daily_report_id'=>$request->daily_report_id,
                    'filename'=>$filename,
                    'description'=>$request->description,
                    'project_user_id'=>$request->project_user_id,
                ]);
                $dailyReport = DailyReport::find($request->daily_report_id);
                return redirect()->route('dailyReports.edit',$dailyReport);
            }else{
                return back()->withErrors('no File');
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(AttachmentDailyReport $attachmentDailyReport){
        $dailyReport = DailyReport::find($attachmentDailyReport->daily_report_id);
        $filename = $attachmentDailyReport->filename;
        $attachmentDailyReport->delete();
        unlink(public_path().'/documents/agreement/dailyreports/attachments/'.$filename);
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}
