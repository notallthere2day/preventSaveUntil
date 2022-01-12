
if ($hook_event == 'redcap_data_entry_form_top' ) {
	
  if($instrument=="econsent"){
	
	//check that participant has consented before allowing the user to save the page
	
	$econsentCompleteField="pt_e_consent_complete";
	//load record data
	$loadScreeningRecord=REDCap::GetData('array',$record, $event_id, $econsentCompleteField );
	//var_dump($loadScreeningRecord);
	
	//check whether patient has consented by wither electronic or paper means
	$patientEConsented='';
	$patientEConsented=$loadScreeningRecord[$record][$event_id][$econsentCompleteField];
	//echo "PatientEConsented = $patientEConsented <br/><br/>";
		if($patientEConsented==''){
			//hide and disable all the save buttons, and display a message explaining this to the researcher
			
				
			echo "<style type='text/css'>#submit-btn-dropdown, #formSaveTip,#submit-btn-savecontinue, #submit-btn-saveexitrecord, #submit-btn-savenextrecord, #submit-btn-savenextform, #submit-btn-saverecord, .dataEntrySaveLeavePageBtn {display:none !important}</style>";

			echo "<script type='text/javascript'>

						jQuery(document).ready(function() {
							$('#submit-btn-saverecord').attr('disabled','disabled');
							$('#submit-btn-dropdown').attr('disabled','disabled');
							$('#submit-btn-savecontinue').attr('disabled','disabled');
							$('#submit-btn-saveexitrecord').attr('disabled','disabled');
							$('#submit-btn-savenextrecord').attr('disabled','disabled');
							$('#submit-btn-savenextform').attr('disabled','disabled');
							$('#submit-btn-saverecord').attr('disabled','disabled');
							$('.dataEntrySaveLeavePageBtn').attr('disabled','disabled');
						});
						</script>";

			echo "<div class='green'>The e-consent form will be enabled for researchers to counter-sign once the participant has completed it.</div><br/><br/>";
			
		}
	
	}

}
