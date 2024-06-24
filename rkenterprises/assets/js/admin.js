/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 function printdiv(divid){
     
   
           window.print();
          window.close();         
          return true;
        
    }
    

 
 
 
 
$(document).ready(function () {
    
    
    

    $("#myCarousel").carousel('cycle');
    
    
     $('[name="changepassword"]').on('click', function (e) {
        //e.preventDefault();
        $newpassword=($('[name=newpassword]').val());
        $retypepassword=($('[name=retypepassword]').val());
        if($newpassword==='' || $retypepassword===''){
            $('.error').html="Both fields must be filled!";
            
        }else if(strlen($newpassword)<8 ||strlen($retypepassword)<8){
            $('.error').html="Password should be of minimum 8 characters!";
        }else if($newpassword!==$retypepassword){
             $('.error').html="Password Mismatch!";
        } else if (confirm("Are you sure,you want to change password?")) {
            //alert("submitted"); 
            $('#frm-mobile-verification').submit();
        } else{
            alert("Action aborted.");
        }
    });
    
    
    

    $('[name="deleteUser"]').on('click', function (e) {
        //e.preventDefault();
        if (confirm("Are you sure,you want to delete the data")) {
            //alert("submitted"); 
            $('#deleteUserForm').submit();
        } else {
            alert("Action Aborted");
        }
    });

    $('[name="sortviewdesc"],[name="sortviewasc"]').on('click', function (e) {
        //e.preventDefault();
        // alert("submitted"); 
        $('#adminUserListForm').submit();

    });


    $('[name="createCaptcha"]').on('click', function (e) {


        e.preventDefault();
        //var selection = ($('#examlist').val());
        var url = '/apoorvatraders/index.php/home/createCaptcha?display=y';
        $.ajax({
            type: 'GET',
            url: url,cache:false,
            timeout: 5000,
            beforeSend: function () {
                $('#captchaImage').html('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
                $('#captchaImage').html(data);
            }

        });
    });

    $('body,input').on('change', '[name="branchSelect"]', function (e) {
        e.preventDefault();
        var selectedBranch = $('[name="branchSelect"]').val();
       //alert(selectedBranch);
        
        var url = '/apoorvatraders/index.php/member/getCustomerList?branchid=' + selectedBranch;
     //alert(url);
        $('#customerContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerContent').append('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('#customerContent').html(data);
            }

        });

    });
    
    
    
    
    $('body,input').on('change', '[name="branchSelectAccountSummary"]', function (e) {
        e.preventDefault();
        var selectedBranch = $('[name="branchSelectAccountSummary"]').val();
       //alert(selectedBranch);
        
        var url = '/apoorvatraders/index.php/member/customerAccountSummaryView?branchid=' + selectedBranch;
     //alert(url);
        $('#summaryContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#summaryContent').append('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('#summaryContent').append(data);
            }

        });
       

    });
    
     
    
    
    
    $('body,input').on('change', '[name="customerSelectAccountDetail"]', function (e) {
        e.preventDefault();
        var selectedCustomer = $('[name="customerSelectAccountDetail"]').val();
       //alert(selectedBranch);
        
        var url = '/apoorvatraders/index.php/member/customerAccountDetailView?customerid=' + selectedCustomer;
     //alert(url);
        $('#customerAccountDetailContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerAccountDetailContent').append('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('#customerAccountDetailContent').html(data);
            }

        });

    });
    
    
    
    
     $('body,input').on('change', '[name="customerSelectForBranch"]', function (e) {
        e.preventDefault();
        var selectedCustomer = $('[name="customerSelectForBranch"]').val();
       //alert(selectedBranch);
        
        var url = '/apoorvatraders/index.php/branch/customerLedgerView?customerid=' + selectedCustomer;
     //alert(url);
        $('#customerLedgerForBranchContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerAccountDetailContent').append('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('#customerLedgerForBranchContent').html(data);
            }

        });

    });
    
    
  
   
    
    
    
    
 /*   
    
    
   $('body,input').on('change', '[name="examSelect"]', function (e) {
        e.preventDefault();
        var selectedExam = $('[name="examSelect"]').val();
        //alert(selectedExam);
        
        var url = '/exameasy/index.php/question/showQuestionsOfSelectedExam?examid=' + selectedExam;
        //alert(url);
        $('#questionContent').html("");
        $.ajax({
            type: 'GET',
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#questionContent').append('<div id="loading" class="text-center"><img src="/exameasy/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
                //alert(data);
                $('#questionContent').html(data);
            }

        });

    });
    $('body,#addQuestionfrm').on('submit', '[id="addQuestionfrm"]', function (e) {

        //var selectedExam = $('[name="addQuestionBtn"]').val();
        //alert(selectedExam);
        var url = '/exameasy/index.php/faculty/addQuestionForm';
        
        var formData = $('#addQuestionfrm').serialize();
        //alert(formData);
        $('#examContent').html("");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('#examContent').append('<div id="loading" class="text-center"><img src="/exameasy/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
                //alert(ajaxdata);
                $('#examContent').html(ajaxdata);
            },
            fail: function () {
                $('#examContent').html("Addition of question Failed,Try Again.");
            }

        });
        

    });


    $('body,input').on('change', '[name="salutation"]', function (e) {
        e.preventDefault();
        var salutation = $('[name="salutation"]').val();
        if (salutation === 'daughter') {
            //alert(salutation);
            $('#femaleRadio').prop('checked', 'TRUE');
            //$('#femaleRadio').
        }
        else if (salutation === 'son') {
            // alert(salutation);
            $('#maleRadio').prop('checked', 'TRUE');
        }
        else if (salutation === 'other') {
            //alert(salutation);
            $('#otherRadio').prop('checked', 'TRUE');
        }

    });


    $('body,input').on('click change', '[name="qtype"]', function (e) {
        //e.preventDefault();
        var selection = $('[name="qtype"]:checked').val();
        //alert(selection);
        $('#answer').val('');
        $('[name="selectAnswer"]').prop('checked', '');
        if (selection === 'TF') {
            $('#optionAText').val('True').prop('disabled', 'TRUE');
            $('#optionBText').val('False').prop('disabled', 'TRUE');
            $('#optionCText').val('NULL').prop('disabled', 'TRUE');
            $('#optionDText').val('NULL').prop('disabled', 'TRUE');
            $('#optionCTextGroup').val('').fadeOut('slow');
            $('#optionDTextGroup').val('').fadeOut('slow');
            $('#labelOptionC').val('').fadeOut('slow');
            $('#labelOptionD').val('').fadeOut('slow');

        }
        else if (selection === 'MCQ') {
            $('#optionAText').prop('disabled', '').val('');
            $('#optionBText').prop('disabled', '').val('');
            $('#optionCTextGroup').val('').fadeIn('slow');
            $('#optionDTextGroup').val('').fadeIn('slow');
            $('#optionCText').val('');
            $('#optionDText').val('');
            $('#labelOptionC').val('').fadeIn('slow');
            $('#labelOptionD').val('').fadeIn('slow');

        }


    });

    $('body,input').on('click change', '[name="selectAnswer"]', function (e) {
        var selection = $('[name="selectAnswer"]:checked').val();
        var qtype = $('[name="qtype"]:checked').val();
        var answer = '';
        var optionA = $('#optionAText').val();
        var optionB = $('#optionBText').val();
        var optionC = $('#optionCText').val();
        var optionD = $('#optionDText').val();
        if (qtype === 'TF') {
            if (selection === 'optionA') {
                answer = 'True';
            } else if (selection === 'optionB') {
                answer = 'False';
            } else {
                alert('Only option A and B are valid for True/False type question.');
            }
        } else if (qtype === 'MCQ') {
            if (optionA === '' || optionC === '' || optionC === '' || optionD === '') {
                $('#answer').val('');
                $('[name="selectAnswer"]').prop('checked', '');
                alert('Fill all the options before selecting answer');
            } else {

                if (selection === 'optionA') {

                    answer = $('#optionAText').val();
                } else if (selection === 'optionB') {
                    answer = $('#optionBText').val();
                } else if (selection === 'optionC') {
                    answer = $('#optionCText').val();
                } else if (selection === 'optionD') {
                    answer = $('#optionDText').val();
                } else {
                    alert('Only option A,B,C and D are valid for Multiple Choice type question.');
                }
            }
        }
        $('#answer').val(answer);

    });
    */
 
    
     $('body,button').on('click submit', '[name="searchChasisBtn"]', function (e) {
        e.preventDefault();
        var financeid = $('[name="chasisno"]').val();
       //alert(selectedBranch);
        
        var url = '/apoorvatraders/index.php/member/updateFinance?financeid=' +financeid;
     //alert(url);
        $('[name="chasisFinanceContent"]').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('[name="chasisFinanceContent"]').append('<div id="loading" class="text-center"><img src="/apoorvatraders/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('[name="chasisFinanceContent"]').append(data);
            }

        });
       

    });  
    
    
    
    
  
    
    
    
    
    
    
    
      $('div#main  div[name="chasisFinanceContent"]').on('click', '[name="updateFinanceBtn"]', function (e) {
          
         e.preventDefault();
          
          var status=($('[name="cibilcheckbox"]').is(":checked")||$('[name="cibildatecheckbox"]').is(":checked")||$('[name="agreementdatecheckbox"]').is(":checked")||$('[name="agreementcheckbox"]').is(":checked")||$('[name="documentcheckbox"]').is(":checked")||$('[name="financercheckbox"]').is(":checked")||$('[name="executivecheckbox"]').is(":checked")||$('[name="docheckbox"]').is(":checked")||$('[name="dodatecheckbox"]').is(":checked")||$('[name="pddcheckbox"]').is(":checked")||$('[name="pdddatecheckbox"]').is(":checked")||$('[name="paymentcheckbox"]').is(":checked")||$('[name="paymentdatecheckbox"]').is(":checked")||$('[name="loanamountcheckbox"]').is(":checked")||$('[name="doamountcheckbox"]').is(":checked"));
          
           //alert("hello "+status);
           if(status){
         
         if( confirm("Do you want to update the data?")) {
           
             // alert("Submitted ");
             $('#updateFinancefrm') .attr('action','/apoorvatraders/index.php/member/updateFinanceHandler').submit();
         }else{
             alert("Update Aborted!");
             
         }
           }else{
               alert("Please Select At Least One Option To Update or Abort.");
           }
          
      });
      
     
    $('div#main  div[name="chasisFinanceContent"]').on('click','[name="cancelUpdateFinanceBtn"]',function (e) {
        //  alert("hello ");
         e.preventDefault();
       var status=confirm("Do you want to abort update? Click cancel to stay on page.");
         
  if(status) {
           
    $('div[name="chasisFinanceContent"]').html("")  ; 
           
    }   
          
    });  
          
       
         
         
         
        
    
      
    
    
      $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="cibilcheckbox"]', function (e) {
          
          var status=$('[name="cibilcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="cibil"]').prop('disabled',"") ;
             
         }else{
             $('[name="cibil"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="cibildatecheckbox"]', function (e) {
          
          var status=$('[name="cibildatecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="cibildate"]').prop('disabled',"") ;
             
         }else{
             $('[name="cibildate"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
       $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="agreementcheckbox"]', function (e) {
          
          var status=$('[name="agreementcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="agreement"]').prop('disabled',"") ;
             
         }else{
             $('[name="agreement"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="agreementdatecheckbox"]', function (e) {
          
          var status=$('[name="agreementdatecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="agreementdate"]').prop('disabled',"") ;
             
         }else{
             $('[name="agreementdate"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
    
       $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="paymentcheckbox"]', function (e) {
          
          var status=$('[name="paymentcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="payment"]').prop('disabled',"") ;
             
         }else{
             $('[name="payment"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="paymentdatecheckbox"]', function (e) {
          
          var status=$('[name="paymentdatecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="paymentdate"]').prop('disabled',"") ;
             
         }else{
             $('[name="paymentdate"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
    
    
      $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="pddcheckbox"]', function (e) {
          
          var status=$('[name="pddcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="pdd"]').prop('disabled',"") ;
             
         }else{
             $('[name="pdd"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="pdddatecheckbox"]', function (e) {
          
          var status=$('[name="pdddatecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="pdddate"]').prop('disabled',"") ;
             
         }else{
             $('[name="pdddate"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
      
      $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="financercheckbox"]', function (e) {
          
          var status=$('[name="financercheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="financer"]').prop('disabled',"") ;
             
         }else{
             $('[name="financer"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="executivecheckbox"]', function (e) {
          
          var status=$('[name="executivecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="executive"]').prop('disabled',"") ;
             
         }else{
             $('[name="executive"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
      
      
      
      
      $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="docheckbox"]', function (e) {
          
          var status=$('[name="docheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="do"]').prop('disabled',"") ;
             
         }else{
             $('[name="do"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="dodatecheckbox"]', function (e) {
          
          var status=$('[name="dodatecheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="dodate"]').prop('disabled',"") ;
             
         }else{
             $('[name="dodate"]').prop('disabled',"disabled") ;
             
         }
          
      });
    
      $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="loanamountcheckbox"]', function (e) {
          
          var status=$('[name="loanamountcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="loanvalue"]').prop('disabled',"") ;
             
         }else{
             $('[name="loanvalue"]').prop('disabled',"disabled") ;
             
         }
          
      });
      
      
        $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="doamountcheckbox"]', function (e) {
          
          var status=$('[name="doamountcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="dovalue"]').prop('disabled',"") ;
             
         }else{
             $('[name="dovalue"]').prop('disabled',"disabled") ;
             
         }
          
      });
    
     $('div#main  div[name="chasisFinanceContent"]').on('change click', '[name="documentcheckbox"]', function (e) {
          
          var status=$('[name="documentcheckbox"]').is(":checked");
          //alert("hello "+status);
         if(status) {
            $('[name="document"]').prop('disabled',"") ;
             
         }else{
             $('[name="document"]').prop('disabled',"disabled") ;
             
         }
          
      });
    
    
     $('div#main  div[name="chasisFinanceContent button"]').on('click', '[name="cancelUpdateFinanceBtn"]', function (e) {
        e.preventDefault(); 
         $('#loanvalue').prop('disabled','disabled');
         $('#dovalue').prop('disabled','disabled');
         
       $('[name="chasisFinanceContent"]').html("");  
         
         
     });
     
     
    $('div#main  div[name="chasisFinanceContent"]').on('click', '#paymentdate', function (e) {
        e.preventDefault(); 
     $('#paymentdate').datepicker({ 
        autoclose: true, 
        todayHighlight: false
  }).datepicker('update', new Date());
 
     
    }); 
   $('div#main  div[name="chasisFinanceContent"]').on('click', '#pdddate', function (e) {
        e.preventDefault(); 
     $("#pdddate").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
 
     
    });  
    $('div#main  div[name="chasisFinanceContent"]').on('click', '#dodate', function (e) {
        e.preventDefault(); 
     $("#dodate").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
 
     
    });    
  
   $('div#main  div[name="chasisFinanceContent"]').on('click', '#cibildate', function (e) {
        e.preventDefault(); 
     $("#cibildate").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
 
     
    }); 
   
   $('div#main  div[name="chasisFinanceContent"]').on('click', '#agreementdate', function (e) {
        e.preventDefault(); 
     $("#agreementdate").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
 
     
    }); 
  
  
     
     $('#atsTable').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				[3, 'asc'],
				[2, 'asc']
		]
});
  
 $('#stockTable').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				[3, 'asc'],
				[2, 'asc']
		]
}); 


 $('body,button[name="filter"]').on('click', 'button[name="filter"]', function (e) {
     
   
     $('#dataTableBranchSummary').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				[1, 'asc'],
				[0, 'asc']
		]
});  
     
    $('button[name="filter"]').fadeOut();  
     
 });

 
 $('#dataTableBranchSummary').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				[1, 'asc'],
				[0, 'asc']
		]
});  



     
     /*
     
     
     
     
     
     
     
     
      $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
     
     
      $("#paymentdate").datetimepicker({
      
      format: 'yyyy-mm-dd',
      autoclose: true
      
      
     } );
     
     
      $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });

 $('body#atsTable').DataTable (); 
 
     $('body#dataTableBranchSummary').dataTable
     ({
         pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true'
         
     }); */
     
});

