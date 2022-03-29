<?php

namespace App\Services;

use SoapClient;

class RivileService{

    private $soapclient;
    private $api_key;

    public function __construct()
    {
        $this->soapclient = new SoapClient('http://manorivile.lt/WEBSERVICE_RIV_WEB/awws/webservice.awws?wsdl');
        $this->api_key = '1DB70DF.UFi8Gjtf1KqmyEHmtC3aTr1VLyNc068IlYtyPLpr';
    }
    
    function createCustomer( $data ){

    	$date = date('Y-m-d').' 00:00';
		$xml_code = '<N08>
		    <N08_KODAS_KS>3445343552</N08_KODAS_KS>
		    <N08_RUSIS>3</N08_RUSIS>
		    <N08_PVM_KODAS></N08_PVM_KODAS>
		    <N08_IM_KODAS>3445343552</N08_IM_KODAS>
		    <N08_PAV>Rasel hasan</N08_PAV>
		    <N08_ADR></N08_ADR>
		    <N08_KODAS_VS></N08_KODAS_VS>
		    <N08_PASTAS></N08_PASTAS>
		    <N08_ATSTOVAS></N08_ATSTOVAS>
		    <N08_E_MAIL></N08_E_MAIL>
		    <N08_FAX_NUM></N08_FAX_NUM>
		    <N08_TEL>019098882513</N08_TEL>
		    <N08_MOB_TEL></N08_MOB_TEL>
		    <N08_KODAS_LS_1></N08_KODAS_LS_1>
		    <N08_KODAS_LS_2></N08_KODAS_LS_2>
		    <N08_KODAS_LS_3></N08_KODAS_LS_3>
		    <N08_KODAS_LS_4></N08_KODAS_LS_4>
		    <N08_TIPAS_PIRK>1</N08_TIPAS_PIRK>
		    <N08_TIPAS_TIEK>1</N08_TIPAS_TIEK>
		    <N08_KODAS_GS></N08_KODAS_GS>
		    <N08_CREDIT_LIM>0.00</N08_CREDIT_LIM>
		    <N08_KODAS_DS>PT001</N08_KODAS_DS>
		    <N08_DELSPINIGIAI>0.00</N08_DELSPINIGIAI>
		    <N08_KODAS_QS></N08_KODAS_QS>
		    <N08_NUOL_GR></N08_NUOL_GR>
		    <N08_KODAS_XS_T>PVM</N08_KODAS_XS_T>
		    <N08_KODAS_XS_P>PVM</N08_KODAS_XS_P>
		    <N08_KODAS_TS_T></N08_KODAS_TS_T>
		    <N08_KODAS_TS_P></N08_KODAS_TS_P>
		    <N08_ADD_DATE>'.$date.'</N08_ADD_DATE>
		    <N08_SUTARTIS>0</N08_SUTARTIS>
		    <N08_KAIN_ABC>0</N08_KAIN_ABC>
		    <N08_DIENOS>1</N08_DIENOS>
		    <N08_TIEK_DIEN>0</N08_TIEK_DIEN>
		    <N08_KRED_LIM>0</N08_KRED_LIM>
		    <N08_PRIEDAI>0</N08_PRIEDAI>
		    <N08_KODAS_IS></N08_KODAS_IS>
		    <N08_KODAS_OS_P></N08_KODAS_OS_P>
		    <N08_KODAS_OS></N08_KODAS_OS>
		    <N08_KODAS_MS_P></N08_KODAS_MS_P>
		    <N08_KODAS_MS_T></N08_KODAS_MS_T>
		    <N08_VAL_POZ>0</N08_VAL_POZ>
		    <N08_KODAS_VL_1></N08_KODAS_VL_1>
		    <N08_KODAS_VL_2></N08_KODAS_VL_2>
		    <N08_KODAS_VL_3></N08_KODAS_VL_3>
		    <N08_KODAS_VL_4></N08_KODAS_VL_4>
		    <N08_KODAS_VL_5></N08_KODAS_VL_5>
		    <N08_KODAS_VL_6></N08_KODAS_VL_6>
		    <N08_POZ_DATE>0</N08_POZ_DATE>
		    <N08_BEG_DATE>'.$date.'</N08_BEG_DATE>
		    <N08_END_DATE>'.$date.'</N08_END_DATE>
		    <N08_ADDUSR>MASTER</N08_ADDUSR>
		    <N08_USERIS>MASTER</N08_USERIS>
		    <N08_R_DATE>'.$date.'</N08_R_DATE>
		    <N08_GER_POZ>0</N08_GER_POZ>
		    <N08_KODAS_LS_5></N08_KODAS_LS_5>
		    <N08_KODAS_LS_6></N08_KODAS_LS_6>
		    <N08_KODAS_LS_7></N08_KODAS_LS_7>
		    <N08_KODAS_LS_8></N08_KODAS_LS_8>
		    <N08_T_LIM_POZ>0</N08_T_LIM_POZ>
		    <N08_T_KRED_LIM>0.00</N08_T_KRED_LIM>
		    <N08_KODAS_VL_LIM></N08_KODAS_VL_LIM>
		    <N08_KAINYNAS></N08_KAINYNAS>
		    <N08_AR_REIK_P>0</N08_AR_REIK_P>
		    <N08_AR_REIK_T>0</N08_AR_REIK_T>
		    <N08_REZERVAS></N08_REZERVAS>
		    <N08_INTRASTAT>0</N08_INTRASTAT>
		    <N08_WB_KR>0</N08_WB_KR>
		    <N08_WB_KR_GR>0</N08_WB_KR_GR>
		    <N08_SUMA_WK_LIMIT>0.00</N08_SUMA_WK_LIMIT>
		    <N08_SUMA_WK>0.00</N08_SUMA_WK>
		    <N08_KODAS_VL_U></N08_KODAS_VL_U>
		</N08>';
		$send_rivile = $this->soapclient->EDIT_N08($this->api_key,"I",$xml_code);
		return response($send_rivile, 401, ['Content-Type' => 'application/xml']);

    }

    

}