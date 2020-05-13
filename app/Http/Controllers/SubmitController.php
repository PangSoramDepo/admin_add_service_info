<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PX_SERVICE_INFO;

class SubmitController extends Controller
{
    public function submit($start,$name,$class,$method,$level12)
    {
        // dd($level12);
        $temp=\Carbon\Carbon::now()->toDateTimeString();
        $datetime="";
        for($i=0;$i<strlen($temp);$i++){
            if($temp[$i]!="-" && $temp[$i]!=" " && $temp[$i]!=":")
                $datetime.=$temp[$i];
        }
        $datetime.="168";
        // $service_number=99990000+$start;
        $service_number=$start;

        $result['SRVC_TYCD']            = "O";
        $result['SRVC_NAME']            = $name;
        $result['BIZ_CODE_LEVEL1']      = "CLM";
        $result['BIZ_CODE_LEVEL2']      = "MPS";
        $result['SRVC_IMP_CLASS']       = "kv.mc.".$level12.".pbp.".$class;
        $result['MTHD_IN_LAYOUT_ID']    = "";
        $result['MTHD_OUT_LAYOUT_ID']   = "";
        $result['BIZ_PRE_POST_PROC_MODULE'] = "";
        $result['STATUS_CODE']          = "Y";
        $result['TRX_KIND_TYPE']        = "2";
        $result['TRX_PROC_TYPE']        = "2";
        $result['TRX_TIMEOUT']          = "0";
        $result['OUT_SIZE_LIMIT_YN']    = "N";
        $result['SYS_LOG_LEVEL']        = "1111";
        $result['TRACE_LOG_OUT_OPT']    = "111";
        $result['TRACE_LOG_LEVEL']      = "0";
        $result['IN_MSG_LOG_YN']        = "Y";
        $result['OUT_MSG_LOG_YN']       = "Y";
        $result['SRVC_ITLK_RSTRC_YN']   = "N";
        $result['CALEE_ASYNC_YN']       = "N";
        $result['IMPT_SRVC_YN']         = "N";
        $result['MAIN_FUNC_DESC']       = "";
        $result['MNTR_RSPN_TM']         = "0";
        $result['TX_VLD_TM_FROM']       = "000000";
        $result['TX_VLD_TM_TO']         = "235959";
        $result['CNFM_TX_YN']           = "N";
        $result['TX_CTRL_EXCPT_YN']     = "N";
        $result['IN_MSG_SKIP_YN']       = "N";
        $result['OUT_MSG_SKIP_YN']      = "N";
        $result['MAX_IN_SIZE']          = "30000";
        $result['MAX_OUT_SIZE']         = "30000";
        $result['MASS_IN_TRX_ALLOW_YN'] = "Y";
        $result['MASS_OUT_TRX_ALLOW_YN']= "Y";
        $result['MNGR_APRV_SRVC_YN']    = "N";
        $result['NEED_APPROVAL_YN']     = "N";
        $result['CREATE_USER_ID']       = "admin";
        $result['CREATE_DATETIME']      = $datetime;
        $result['MODIFY_USER_ID']       = "admin";
        $result['MODIFY_DATETIME']      = $datetime;

        $s1=$result;
        $s1['SRVC_ID'] = $service_number;
        $s1['SRVC_IMP_MTHD'] = $method;

        // $s2=$result;
        // $s2['SRVC_ID'] = "MPS".$service_number++;
        // $s2['SRVC_IMP_MTHD'] = "find".$method."ById";

        // $s3=$result;
        // $s3['SRVC_ID'] = "MPS".$service_number++;
        // $s3['SRVC_IMP_MTHD'] = "insert".$method;

        // $s4=$result;
        // $s4['SRVC_ID'] = "MPS".$service_number++;
        // $s4['SRVC_IMP_MTHD'] = "delete".$method."ById";

        // $s5=$result;
        // $s5['SRVC_ID'] = "MPS".$service_number++;
        // $s5['SRVC_IMP_MTHD'] = "update".$method."ById";

        PX_SERVICE_INFO::create($s1);
        // PX_SERVICE_INFO::create($s2);
        // PX_SERVICE_INFO::create($s3);
        // PX_SERVICE_INFO::create($s4);
        // PX_SERVICE_INFO::create($s5);

        return "Done";
    }

    public function reset()
    {
        // PX_SERVICE_INFO::
    }
}
