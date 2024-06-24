/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 function printdiv(divid){
     
   console.log("printdiv");
           window.print();
          window.close();         
          return true;
        
    }
	
	 function print__div(divid){
		 alert("print");
		 console.log("print__div");
        var contents=document.getElementById(divid).innerHTML;
        var original=document.body.innerHTML;
		console.log(contents);
		// var myWindow = window.open('','','height=500','width=500');
		// myWindow.document.write('<html><body>');
		// myWindow.document.write(contents);
		// myWindow.document.write('</body></html>');
		// myWindow.document.close();
		// myWindow.print();
		document.body.innerHTML = contents;
   
           window.print();
		   document.body.innerHTML=original;
          //window.close();         
          return true;
		  // myWindow.close();
		  // return;
        
    }
    

 
 
 
 
$(document).ready(function () {
    
    
    

    $("#myCarousel").carousel('cycle');
    
    
     $('[name="changepassword"]').on('click', function (e) {
         $('.error').html("");
        //e.preventDefault();
        $newpassword=($('[name=newpassword]').val());
        $retypepassword=($('[name=retypepassword]').val());
        if($newpassword==='' || $retypepassword===''){
            // alert("Both fields must be filled!");
            //$('.error').html("<span class='alert alert-info' role='alert'>Both fields must be filled!</span>");
            $('.error').html("Both fields must be filled!");
            
        }else if($newpassword.length<8 ||($retypepassword.length)<8){
            $('.error').html("Password should be of minimum 8 characters!");
        }else if($newpassword!==$retypepassword){
             $('.error').html("Password Mismatch!");
        } else if (confirm("Are you sure,you want to change password?")) {
            //alert("submitted"); 
            $('#frm-mobile-verification').submit();
        } else{
            alert("Action aborted.");
        }
    });
    
    
    
    
     
     $('[name="changerole"]').on('click', function (e) {
         
        //e.preventDefault();
        var userrole=($('[name=selectrole]').val());
        var uid=($('[name=selectuser1]').val());
        
        var url = '/rkenterprises/index.php/admin/changeRole?uid=' + uid+'&userrole='+userrole;
       // alert(url);
        
          $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
           
            success: function (data) {
               
              alert(data);
              
              
            }

        });
        
    });
    
    
    
    
    
    $('body,input').on('change', '[name="selectuser1"]', function (e) {
        e.preventDefault();
        var selecteduser = $('[name="selectuser1"]').val();
     //  alert(selecteduser);
        
        var url = '/rkenterprises/index.php/admin/getRole?uid=' + selecteduser;
   // alert(url);
        $('#roleselect').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
           
            success: function (data) {
                //var image=data[0];
               //alert(data);
               var x='Current role of selected user is '+data+',click ok to proceed';
               if( confirm(x)){
                    $('#selectrole').prop('disabled',false);
                   $('#changerole').prop('disabled',false);
                   
               }else{
                   $('#changerole').prop('disabled',true);
                    $('#selectrole').prop('disabled',true);
               }
              
              
            }

        });

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
        var url = '/rkenterprises/index.php/captcha?display=y';
        $.ajax({
            type: 'GET',
            url: url,cache:false,
            timeout: 5000,
            beforeSend: function () {
                $('#captchaImage').html('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
        
        var url = '/rkenterprises/index.php/member/getCustomerList?branchid=' + selectedBranch;
     //alert(url);
        $('#customerContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
        
        var url = '/rkenterprises/index.php/member/customerAccountSummaryView?branchid=' + selectedBranch;
     //alert(url);
        $('#summaryContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#summaryContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
        
        var url = '/rkenterprises/index.php/member/customerAccountDetailView?customerid=' + selectedCustomer;
     //alert(url);
        $('#customerAccountDetailContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerAccountDetailContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
    
    
    // Load money receipt on clicking transaction id in ledger view
    
     $('body ,div#customerAccountDetailContent table[name="customerLedgerTable"]').on('click', 'button[class="tid"]', function (e) {
        e.preventDefault();
       // var selectedTransactionId = $('button[class="tid"]').val();
		 var selectedTransactionId = $(this).val();
      // alert(selectedTransactionId);
	   var url = '/rkenterprises/index.php/member/loadMoneyReceipt/'+selectedTransactionId+'?transactionid=' + selectedTransactionId;
    // alert(url);
      // /* 
        
        $('#customerAccountPrintContent').html("");
        $.ajax({
            type: 'GET',
			cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerAccountPrintContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (data) {
                //var image=data[0];
              // alert(data);
               $('#customerAccountPrintContent').html(data);
            }

        });
	//	*/

    });
    
    
    
    
     $('body,input').on('change', '[name="customerSelectForBranch"]', function (e) {
        e.preventDefault();
        var selectedCustomer = $('[name="customerSelectForBranch"]').val();
       //alert(selectedBranch);
        
        var url = '/rkenterprises/index.php/branch/customerLedgerView?customerid=' + selectedCustomer;
     //alert(url);
        $('#customerLedgerForBranchContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('#customerAccountDetailContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
    
    
  
   
   $('body,input').on('change', '[name="criteriaSelect"]', function (e) {
       e.preventDefault();
        //  console.log("123456");
          var status=$('[name="criteriaSelect"]').val();
         // alert("hello "+status);
     //  /* 
       if(status==="bychasis") {
            $('[name="chasisno"]').prop('disabled',"") ;
            $('[name="vehicleMovementSearchBtn"]').prop('disabled',"") ;
            
            $('[name="fromdate"]').prop('disabled',"disabled") ;
            $('[name="todate"]').prop('disabled',"disabled") ;
             
         }else if(status==="bydate"){
              $('[name="chasisno"]').prop('disabled',"disabled") ;
            $('[name="fromdate"]').prop('disabled',"") ;
            $('[name="vehicleMovementSearchBtn"]').prop('disabled',"") ;
            $('[name="todate"]').prop('disabled',"disabled") ;
           
             
         }else if(status==="bydaterange"){
              $('[name="chasisno"]').prop('disabled',"disabled") ;
            $('[name="fromdate"]').prop('disabled',"") ;
            $('[name="todate"]').prop('disabled',"") ;
            $('[name="vehicleMovementSearchBtn"]').prop('disabled',"") ;
          }else{
               $('[name="chasisno"]').prop('disabled',"disabled") ;
            $('[name="fromdate"]').prop('disabled',"disabled") ;
            $('[name="todate"]').prop('disabled',"disabled") ;
            $('[name="vehicleMovementSearchBtn"]').prop('disabled',"disabled") ;
          }
        //  */
      }); 
      
      
       $('body,input').on('change', '[name="companySelect"]', function (e) {
        e.preventDefault();
        var selectedCompany = $('[name="companySelect"]').val();
       //alert(selectedBranch);
        
        var url = '/rkenterprises/index.php/member/getLastInvoiceNo?companyid=' + selectedCompany;
     //alert(url);
        //$('#customerContent').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
           
            success: function (data) {
                //var image=data[0];
               //alert(data);
                $('#invoiceno').val(data);
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
        
        var url = '/rkenterprises/index.php/member/updateFinance?financeid=' +financeid;
     //alert(url);
        $('[name="chasisFinanceContent"]').html("");
        $.ajax({
            type: 'GET',cache:false,
            url: url,
            timeout: 5000,
            beforeSend: function () {
                $('[name="chasisFinanceContent"]').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
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
             $('#updateFinancefrm') .attr('action','/rkenterprises/index.php/member/updateFinanceHandler').submit();
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
    
     $('div#main ').on('click', '#invoicedate', function (e) {
        e.preventDefault(); 
     $('#invoicedate').datepicker({ 
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


$('div#main [name="messageContent"]').on('click', 'button[name="sendMessageBtn"]', function() {
    $('.error').html("");
    
    message=$('div#main [name="messageContent"] textarea').val();
    var allVals = [];
     $('div#main [name="messageContent"] input[name="recipients"]:checked').each(function() {
         var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
       allVals.push(rowdata[4]);
       //console.log(rowdata);
     });
   // console.log(allVals);
    recipients=$('div#main [name="messageContent"] checkbox').val();
   // console.log(recipients);
   //alert("Send Message"+"|"+message+"|"+recipients);
    if(message===""){
        //alert("Empty Message");
        $('.error').html("Please Write Message.");
    }else{
        if(message.length>151){
            $('.error').html("Message should not be more than 150 characters.");
        }else if(allVals.length>0){
            //console.log(allVals);
             $('.error').html("");
           //alert("Form Submitted.");
            //var url = '/rkenterprises/index.php/memberview/sendMessage?numbers='+allVals+'& message='+message;
        var url = '/rkenterprises/index.php/memberview/sendMessage';
       // var formData = $('#sendMessage').serialize();
        //alert(formData);
        $('.error').html("");
        //e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            data: {numbers:allVals,message:message},
            timeout: 5000,
            beforeSend: function () {
                $('.error').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
                alert(ajaxdata);
                //$('.error').html(ajaxdata);
            },
            fail: function () {
                $('.error').html("Send Message Failed,Try Again.");
            }

        });
          //  console.log("recipients");
             
        }else{
            $('.error').html("Please Select Recipients.");
        }
    }
    
    
});


$('div#main [name="vehicleContent"]').on('click', 'button[name="editVehicleBtn"]', function() {
    
    
     var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
    //console.log(rowdata);
    $('#vehicleModifyModal  input[name="chasisno"]').val(rowdata[1]);
    $('#vehicleModifyModal  input[name="engineno"]').val(rowdata[2]);
    // var color='"'+rowdata[3]+'"';
     //alert(color);
      $(' #vehicleModifyModal select[name="colorSelect"] option').filter(function(){        return (this.text==rowdata[3]);    }).attr('selected', 'selected');
   $(' #vehicleModifyModal select[name="modalSelect"] option').filter(function(){        return (this.text==rowdata[4]);    }).attr('selected', 'selected');
    $('#vehicleModifyModal  input[name="batteryno"]').val(rowdata[5]);
    $('#vehicleModifyModal  input[name="reartyreright"]').val(rowdata[6]);
    $('#vehicleModifyModal  input[name="reartyreleft"]').val(rowdata[6]);
    $('#vehicleModifyModal  input[name="fronttyreright"]').val(rowdata[6]);
    $('#vehicleModifyModal  input[name="fronttyreleft"]').val(rowdata[6]);
    $('#vehicleModifyModal  input[name="gearboxno"]').val(rowdata[7]);
    $('#vehicleModifyModal  input[name="keyno"]').val(rowdata[8]);
   if(rowdata[9]){
    $('#vehicleModifyModal  input[name="ecunumber"]').val(rowdata[9]);
        
    }else{
        $('#vehicleModifyModal  input[name="ecunumber"]').val("NA");
        
    }
    $('#vehicleModifyModal button[name="updateVehicleDataBtn"]').val(rowdata[0]);
     
  //  $('select[name="colorSelect"] option[text='+color+']').attr('selected', 'selected');
  
    
    
    
});




//************************************Delete Last Vehicle Transfer**********************************************************

$('div#main [name="vehicleContent"]').on('click', 'button[name="resetVehicleBtn"]', function() {
//console.log("i am here");
	//alert("Select.................");
    
     var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
	var chassisNo=rowdata[1];
	
	var chassisId= $('button[name="resetVehicleBtn"]').val();
	if(confirm("Are you sure,you want to delete Last Delivery Challan  of Chassis "+chassisNo +"?")){
	var url = '/rkenterprises/index.php/memberview/deleteLastDelivery?chassisId='+chassisId;
	//alert("chassisId="+chassisId);
	//alert(url);
	 $.ajax({
            type: "GET",
            url: url,
            //data: (chassisId:chassisId),
            timeout: 10000,
            beforeSend: function () {
                $('div#main [name="vehicleContent"]').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
				alert("Delivery Cancelled Successfully.");               
			    location.reload(true);
            
               }else{
				   alert("Delivery Deletion Failed.Error:-"+ajaxdata);
			   }
             
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
	}else{
	alert("Action Aborted.");
	}	 
	
    
    
});//End of Delete Last Delivery

//********************************************************************************************************




//*******************************************************************************************
//*************************************Search Vehicle to collect data************************
//*******************************************************************************************
$('[name="searchForVehicleDataBtn"]').on('click', function (e) {
    
e.preventDefault();
         $('.error').html("");
         $('[name="vehicleContent"]').html("");
         //$('#showPddResultContent').html("");
        
        var searchText=($('[name=searchText]').val());
        var selectionCriteria=($('[name=criteriaSearchVehicle]').val());
        var pattern=/^\d*$/.test(searchText);
       // $('.error').html(pattern);
        if(searchText===''){
            // alert("Both fields must be filled!");
            //$('.error').html("<span class='alert alert-info' role='alert'>Both fields must be filled!</span>");$selectionCriteria==='bychassisno' && $selectionCriteria==='byengineno' && 
            $('.error').html("Please Fill The Field!");
             $('[name=searchText]').focus();
        }else if((searchText.length)!==5){
            $('.error').html("Length should be of 5 characters!");
             $('[name=searchText]').focus();
        }else if(!pattern){
             $('.error').html("Enter Numeric Value Only!");
              $('[name=searchText]').focus();
        
        }else{
            //alert("Action aborted.");
            $('.error').html("");
           //alert("Form Submitted.");
            var url = '/rkenterprises/index.php/memberview/getVehicleDetailsToDisplay';
        
        var formData = $('#searchVehicleDatafrm').serialize();
        //alert(formData);
        $('[name="vehicleContent"]').html("");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('[name="vehicleContent"]').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
                //alert(ajaxdata);
                $('[name="vehicleContent"]').html(ajaxdata);
            },
            fail: function () {
                $('[name="vehicleContent"]').html("Vehicle Search Failed,Try Again.");
            }

        });
            //$('#searchVehicleDatafrm').submit();
        }
    });//End of Vehicle Search



//*************************************************************************************************
//********************************Add Vehicle Data through Model*******************************
//************************************************************************************************
 $("#vehicleAddfrm").submit(function(e){
	 //alert("Select..........vehicleAddfrm.......");
        e.preventDefault();
       //alert("Select.................");
         
       if($('select[name="modalSelect"]').val()==="select"||$('select[name="colorSelect"]').val()==="select"){
           alert("Select Model and Color");
       }else{
		   //$data= $('#vehicleAddfrm').serializeArray();
		   var formData = $('#vehicleAddfrm').serialize();
		   //alert(formData);
           var url = '/rkenterprises/index.php/addNewVehicle';
          $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('h4#vehicleAddModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
               $('#vehicleAddModal').modal('toggle');
			   location.reload(true);
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
               }
              // $('#customerAddModal').modal('toggle');
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
       }
    });//End of Vehicle Data Add


//*********************************************************************************************

$("#vehicleEditfrm").submit(function(e){
        e.preventDefault();
        //alert("Select.................");
         
       if($('#vehicleEditfrm select[name="modalSelect"]').val()==="select"||$('#vehicleEditfrm select[name="colorSelect"]').val()==="select"){
           alert("Select Model and Color");
       }else{
           //alert($('#vehicleEditfrm select[name="modalSelect"]').val()+"    "+$('#vehicleEditfrm select[name="colorSelect"]').val());
           var vehicleid= $('#vehicleModifyModal button[name="updateVehicleDataBtn"]').val();
           
           var url = '/rkenterprises/index.php/memberview/updateVehicleDetail?vehicleid='+vehicleid;
          // alert(url+"  "+vehicleid);
          $.ajax({
            type: "POST",
            url: url,
            data: $('#vehicleEditfrm').serialize(),
            timeout: 5000,
            beforeSend: function () {
                $('h4#vehicleModifyModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
               $('#vehicleModifyModal').modal('toggle');
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
               }
              // $('#customerAddModal').modal('toggle');
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
       }
    });//End of Vehicle Data Update
//************************************************************************************************************
//********************************************                        ****************************************
//************************************************************************************************************
$('div#main table[name="searchCustomerTable"] tbody').on('click', 'button[name="editCustomerBtn"]', function() {
    //alert("hello brother ");
    var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
    var address=rowdata[3].split(",");
    var branch=rowdata[6].split(",");
    var branchid='"'+branch[1]+'"';
    var modal=rowdata[7].split(",");
    var modalid='"'+modal[1]+'"';
    $('input[name="customername"]').val(rowdata[1]);
    $('input[name="customerfathername"]').val(rowdata[2]);
    $('input[name="customeraddressline1"]').val(address[0]);
    $('input[name="customeraddressline2"]').val(address[1]);
    $('input[name="customerdistrict"]').val(address[2]);
    $('input[name="customerstate"]').val(address[3]);
    $('input[name="customerpin"]').val(address[4]);
    $('input[name="customercontact"]').val(rowdata[4]);
    $('input[name="customeremail"]').val(rowdata[5]);
   // branchSelect modalSelect
   var branchid=branch[1];
    $('select[name="branchSelect"] option[value='+branchid+']').attr('selected', 'selected');
   // $('input[name="branchSelect"] option').val(branchid).attr("selected", "selected");
   var modalid=modal[1];
    $('select[name="modalSelect"] ' ).val(modalid);
    
    //console.log(branchid);
   // console.log(modalid);
    
    $('button[name="updateCustomerBtn"]').val(rowdata[0]);
    
    //console.log(rowdata);
   // console.log(rowdata[1]);
    
});

$('div#main table[name="searchCustomerTable"] tbody').on('click', 'button[name="addTransactionBtn"]', function() {
    var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
    var customerid=rowdata[0];
    var customername=rowdata[1];
    var display="Transaction-"+customerid+"|"+customername;
    console.log(display);
    $('button[name="addDailyTransactionBtn"]').val(rowdata[0]);
    $('div#main  div#addTransactionModal h4#addTransactionModalLabel').text(display);
    
});


//*************************************************************************************************
//********************************Add Customer Data through Model*******************************
//************************************************************************************************
 $("#customerAddfrm").submit(function(e){
	// console.log("add");
        e.preventDefault();
         var url = '/rkenterprises/index.php/memberview/addNewCustomer';
		 //alert(url);
		 console.log(url);
          $.ajax({
            type: "POST",
            url: url,
            data: $('#customerAddfrm').serialize(),
            timeout: 5000,
            beforeSend: function () {
                $('h4#customerAddModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
               $('#customerAddModal').modal('toggle');
            
               }
             
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
    });//End of Customer Data Add
    /*
$('div#main  div#customerAddModal ').on('click', 'button[name="addCustomerBtn"]', function() {
    //var customerid=$('button[name="addCustomerBtn"]').val();
    // e.preventDefault();
    var url = '/rkenterprises/index.php/memberview/addNewCustomer';
   //alert("Form Submitted.");
    var formData = $('#customerAddfrm').serialize();
    //   alert(formData);
   
     $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('h4#customerAddModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
               $('#customerAddModal').modal('toggle');
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
               }
              // $('#customerAddModal').modal('toggle');
             // $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
    //console.log(customerid);
//alert("hello brother "+customerid);
});//End of Add Customer Model*/
//*************************************************************************************************
//******************************** End of Add Customer Data through Model*******************************
//************************************************************************************************



//*************************************************************************************************
//********************************Update Customer Data through Model*******************************
//************************************************************************************************

$('div#main  div#customerModifyModal ').on('click', 'button[name="updateCustomerBtn"]', function() {
    var customerid=$('button[name="updateCustomerBtn"]').val();
     
    var url = '/rkenterprises/index.php/memberview/updateCustomerDetail?customerid='+customerid;
   // alert("Form Submitted."+url);
    var formData = $('#customerSearchfrm').serialize();
    //    alert(formData);
     $.ajax({
            type: "POST",
            url: url,
            data: $('#customerSearchfrm').serialize(),
            timeout: 15000,
            beforeSend: function () {
                $('h4#customerModifyModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
               $('#customerModifyModal').modal('toggle');
              $(' table[name="searchCustomerTable"]').hide();
              location.reload(true);
                //$('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
    //console.log(customerid);
//alert("hello brother "+customerid);
});//End of Update Customer Model

//********************************************************************************************************
//********************************************************************************************************


//*************************************************************************************************
//********************************Add DayBook Data through Model*******************************
//************************************************************************************************

$('div#main div#addTransactionModal').on('click', 'button[name="addDailyTransactionBtn"]', function() {
    var customerid=$('button[name="addDailyTransactionBtn"]').val();
    //console.log(customerid);
//alert("hello brother "+$('button[name="addDailyTransactionBtn"]').val());
  var url = '/rkenterprises/index.php/memberview/updateDayBookTransaction?customerid='+customerid;
    //alert("Form Submitted."+url);
    var formData = $('#addDayBookfrm').serialize();
        //alert(formData);
  //  $('#addDayBookfrm').submit(function() {  
     $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('h4#addTransactionModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
               if(ajaxdata.includes("Success")){
               $('#addTransactionModal').modal('toggle');
              $(' table[name="searchCustomerTable"]').hide();
                //$('#showPddResultContent').html(ajaxdata);
               }
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
       // console.log("??????????????");
  //  });
});


//********************************************************************************************************
//********************************************************************************************************

$('div#main table[name="searchCustomerTable"] tbody').on('click', 'button[name="deleteCustomerBtn"]', function() {
   // alert("hello brother ");
    
    var customerid=$('button[name="deleteCustomerBtn"]').val();
    var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
   var url = '/rkenterprises/index.php/memberview/deleteCustomer?customerid='+customerid;
   if(confirm("You are about to delete customer"+"("+customerid+")"+rowdata[1])){
   $.ajax({
            type: "GET",
            url: url,
            
            timeout: 5000,
            
            success: function (ajaxdata) {
                
               alert(ajaxdata);
               location.reload(true);
               
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
   }
    
});


 $('[name="searchVehicleBtn"]').on('click', function (e) {
         $('.error').html("");
         $('#vehicleContent').html("");
         $('#showPddResultContent').html("");
        //e.preventDefault();
        $searchVehicleCriteria=($('[name=searchVehicleCriteria]').val());
        $selectionCriteria=($('[name=selectionCriteria]').val());
        if($searchVehicleCriteria===''){
            // alert("Both fields must be filled!");
            //$('.error').html("<span class='alert alert-info' role='alert'>Both fields must be filled!</span>");
            $('.error').html("Please Fill The Field!");
             $('[name=searchVehicleCriteria]').focus();
        }else if($selectionCriteria==='chassisno' && ($searchVehicleCriteria.length)!==17){
            $('.error').html("Chassis No should be of 17 characters!");
             $('[name=searchVehicleCriteria]').focus();
        }else if($selectionCriteria==='engineno' && ($searchVehicleCriteria.length)!==10){
             $('.error').html("Engine No should be of 10 characters!");
              $('[name=searchVehicleCriteria]').focus();
        }else if($selectionCriteria==='invoiceno' && ($searchVehicleCriteria.match(/[^0-9]/))){
             $('.error').html("Invoice No format is incorrect !");
              $('[name=searchVehicleCriteria]').focus();
        }else if($selectionCriteria==='customername' && ($searchVehicleCriteria.length)>8){
             $('.error').html("Customer ID Should not be greater than 8 characters !");
              $('[name=searchVehicleCriteria]').focus();
        }else{
            //alert("Action aborted.");
            
           // alert("Form Submitted.");
            var url = '/rkenterprises/index.php/isVehicleExist';
        
        var formData = $('#vehicleSearchfrm').serialize();
        //alert(formData);
        $('#vehicleContent').html("");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('#vehicleContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               // alert(ajaxdata);
                $('#vehicleContent').html(ajaxdata);
            },
            fail: function () {
                $('#vehicleContent').html("Vehicle Search Failed,Try Again.");
            }

        });
            //$('#frm-mobile-verification').submit();
        }
    });


//*************************************************************************************************
//********************************Handle Quotation To Print *******************************
//************************************************************************************************

 $('[name="searchQuotationBtn"]').on('click', function (e) {
         $('.error').html("");
         $('#QuotationContent').html("");
        // $('#showQuotationResultContent').html("");
        //e.preventDefault();
        $searchQuotationCriteria=($('[name=searchQuotationCriteria]').val());
        $selectionCriteriaQuotation=($('[name=selectionCriteriaQuotation]').val());
        if($searchQuotationCriteria===''){
             alert("Both fields must be filled!");
            //$('.error').html("<span class='alert alert-info' role='alert'>Both fields must be filled!</span>");
            $('.error').html("Please Fill The Field!");
             $('[name=searchQuotationCriteria]').focus();
        }else if(($searchQuotationCriteria.match(/[^0-9]/))){
            $('.error').html("Only Number Allowed");
             $('[name=searchQuotationCriteria]').focus();
        }else if($searchQuotationCriteria.length > 5 ){
             $('.error').html("Number should be of less than 6 characters!");
              $('[name=searchQuotationCriteria]').focus();
        }else if(($searchQuotationCriteria.length<1 )){
             $('.error').html("Format is incorrect !");
              $('[name=searchVehicleCriteria]').focus();
        }else{
            //alert("Action aborted.");
			
            $('#showQuotationResultContent').html("");
            //alert("Form Submitted.");
           var url = '/rkenterprises/index.php/isQuotationExist';
        
        var formData = $('#quotationSearchfrm').serialize();
        //alert(formData);
        $('#quotationContent').html("");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            timeout: 10000,
            beforeSend: function () {
                $('#quotationContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
				//alert('Success');
                //alert(ajaxdata);
                $('#quotationContent').html(ajaxdata);
				//$('#quotationContent').html('Success');
            },
            fail: function () {
                $('#quotationContent').html("Quotation Search Failed,Try Again.");
            }

        });
            //$('#frm-mobile-verification').submit();
        }
    });



$('#quotationContent').on('click','button' ,function (e) {
         //$('.error').html("");
         $('#showQuotationResultContent').html("");
           
       // $quotationId=($('[name=showQuotationBtn]').val());
         $quotationId= $(e.target).val(); 
         $quotationType=$(e.target).text();/*		 
		if(e.target.id==='showQuotationBtnB'){
			$quotationType='Type B';
             //alert("TYPE B!");
             
        }else {
			$quotationType='Type A';
			  //alert("TYPE A!");
          
        }*/
				var url = '/rkenterprises/index.php/printQuotation';
		//alert(url +"   " +$quotationType+" id= " +e.target.id+" text="+$(e.target).text()+" value="+$(e.target).val());
        			
            $('#showQuotationResultContent').html("");
            
           
        
        var formData = 'quotationType='+$quotationType+'&quotationId='+$quotationId;
        //alert(formData);
        //$('#quotationContent').html("");
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: url,
            data: formData,
            timeout: 10000,
            beforeSend: function () {
                $('#showQuotationResultContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
				//alert('Success');
                //alert(ajaxdata);
                $('#showQuotationResultContent').html(ajaxdata);
				//$('#quotationContent').html('Success');
            },
            fail: function () {
                $('#showQuotationResultContent').html("Quotation Search Failed,Try Again.");
            }

        });
            //$('#frm-mobile-verification').submit();
        
    });






//*************************************************************************************************












//*************************************************************************************************
//********************************Handle Invoice Data through Model*******************************
//************************************************************************************************

$('div#main ').on('click submit','button[name="addInvoiceToDbBtn"]',function(){
	
	//alert("Select.................");
	if($(' input[name="invoiceno"]').val()<=0){
		alert("Invalid Invoice No.");
		$(' input[name="invoiceno"]').focus();
		
	}else if($('select[name="chasisSelect"]').val()==="select"){
		alert("Select Chassis No.");
		$('select[name="chasisSelect"]').focus();
		
	}else if($(' select[name="salesman"]').val()==="select"){
		alert("Select Salesman");
		$(' select[name="salesman"]').focus();
		
	}else if($(' select[name="financer"]').val()==="select"){
		alert("Select Financier");
		$(' select[name="financer"]').focus();
		
	}else if($(' input[name="saleprice"]').val()<=0)
	   {
           alert("Invalid Ex Showroom Price");
		   //$(' input[name="saleprice"]').prop("text-color","red");
		   $(' input[name="saleprice"]').focus();
		   //$(' input[name="saleprice"]').backgroundColor("red");
       }else{
           var url = '/rkenterprises/index.php/memberview/addNewInvoice';
		  // alert(url+"   "+$('#invoiceAddfrm').serialize());
          $.ajax({
            type: "POST",
            url: url,
            data: $('#invoiceAddfrm').serialize(),
            timeout: 10000,
            beforeSend: function () {
                $('h4#invoiceAddModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
               $('#invoiceAddModal').modal('toggle');
			   location.reload(true);
             
               }
              
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
       }
	
	
	
	
	
});









$('div#main [name="invoiceContent"]').on('click', 'button[name="editInvoiceBtn"]', function() {
    
    
     var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
    console.log(rowdata);
	$('#invoiceModifyModal button[name="updateInvoiceDataBtn"]').val(rowdata[0]);
    $('#invoiceModifyModal  label[name="showinvoiceno"]').html(rowdata[1]);
    $('#invoiceModifyModal  label[name="showchassisno"]').html(rowdata[2]);
    // var color='"'+rowdata[3]+'"';
     //alert(color);
	 $('#invoiceModifyModal  input[name="invoicedatetochange"]').val(rowdata[3]);
	 var salesman=rowdata[5].split(",");
	 var finance=rowdata[6].split(",");
	 //console.log(salesman[1]);
	 console.log(finance[0]);
    //var branchid='"'+branch[1]+'"';
      $(' #invoiceModifyModal select[name="salesmantochange"] option').filter(function(){        return (this.text==salesman[0]);    }).attr('selected', 'selected');
   $(' #invoiceModifyModal select[name="financertochange"] option').filter(function(){        return (this.value==finance[1]);    }).attr('selected', 'selected');
    
    $('#invoiceModifyModal  input[name="salepricetochange"]').val(rowdata[7]);
    $('#invoiceModifyModal  input[name="taxidtochange"]').val(rowdata[8]);
      
    
     
  
  
    
    
    
});

$('div#main  #invoiceEditfrm').on('click submit','button[name="updateInvoiceDataBtn"]',function(){
	//console.log("i am here");
	//alert("Select.................");
	 if($('#invoiceEditfrm select[name="salesmantochange"]').val()==="select"||$('#invoiceEditfrm select[name="financertochange"]').val()==="select"|| $('#invoiceEditfrm input[name="salepricetochange"]').val()<=0
	   )
	   {
           alert("Check data Salesman, Finance ,Exshowroom");
       }else{
		   //alert($('#invoiceEditfrm select[name="salesmantochange"]').val()+"    "+$('#invoiceEditfrm select[name="financertochange"]').val());
           var invoiceid= $('#invoiceModifyModal button[name="updateInvoiceDataBtn"]').val();
           
           var url = '/rkenterprises/index.php/memberview/updateInvoiceDetail?invoiceid='+invoiceid;
          // alert(url+"  "+invoiceid); 
		   
		    $.ajax({
            type: "POST",
            url: url,
            data: $('#invoiceEditfrm').serialize(),
            timeout: 10000,
            beforeSend: function () {
                $('h4#invoiceModifyModalLabel').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
					//alert("Invoice Data Updated Successfully.");
               $('#invoiceModifyModal').modal('toggle');
			   location.reload(true);
            
               }
             
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
		   
		   
		   
	   }
});//End of Invoice Data Update


//********************************************************************************************************

//************************************Delete Invoice**********************************************************

$('div#main [name="invoiceContent"]').on('click', 'button[name="deleteInvoiceBtn"]', function() {
//console.log("i am here");
	//alert("Select.................");
    
     var rowdata = $(this).closest('tr').find('td').map(function() {
        return $(this).text();
    }).get();
	var chassisNo=rowdata[2];
	var invoiceNo=rowdata[1];
	var invoiceid= $('button[name="deleteInvoiceBtn"]').val();
	if(confirm("Are you sure,you want to delete Invoice No. "+invoiceNo+" of Chassis "+chassisNo+"?")){
	var url = '/rkenterprises/index.php/memberview/deleteInvoice?invoiceid='+invoiceid;
	//alert("Invoiceid="+invoiceid);
	//alert(url);
	 $.ajax({
            type: "GET",
            url: url,
            //data: (invoiceid:invoiceid),
            timeout: 10000,
            beforeSend: function () {
                $('div#main [name="invoiceContent"]').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
               
                
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                
               alert(ajaxdata);
                if(ajaxdata.includes("Success")){
				alert("Invoice Deleted Successfully.");               
			    location.reload(true);
            
               }else{
				   alert("Invoice Deletion Failed.Error:-"+ajaxdata);
			   }
             
            },
            fail: function () {
                alert("Action aborted,Try Again.");
            }

        });
	}else{
	alert("Action Aborted.");
	}	 
	
    
    
});//End of Delete Invoice

//********************************************************************************************************







//********************************************************************************************************
$('#searchCustomerTable').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				[0, 'desc']
				
		]
});

$('#showSaleRegisterTable').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				
				[1, 'desc']
		]
});

$('#showCounterStockTable').dataTable({
		pageLength: 10,
		processing: true,
		pagingType: 'full_numbers',
		orderMulti: 'true',
		order: [
				
				[0, 'asc']
		]
});
//**********************************************************************************************
//*****************************Show Tax Invoice to print***********************************************
//***********************************************************************************************

$('#vehicleContent').on('click','button[name="showInvoiceBtn"]', function (e) {
    
     
    $('#showPddResultContent').html("");
    var invoiceid=($('#vehicleContent button[name=showInvoiceBtn]').val());
    var url = '/rkenterprises/index.php/showInvoice?invoiceid='+invoiceid;
   // alert("Form Submitted."+url);
     $.ajax({
            type: "GET",
            url: url,
            //data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('#showPddResultContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               // alert(ajaxdata);
                $('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                $('#showPddResultContent').html("Invoice Loading Failed,Try Again.");
            }

        });
    
    
});


//**********************************************************************************************
//*****************************Show Form21 to print***********************************************
//***********************************************************************************************
$('#vehicleContent').on('click','button[name="showForm21Btn"]', function (e) {
    
     
    $('#showPddResultContent').html("");
    var invoiceid=($('#vehicleContent button[name=showForm21Btn]').val());
    var url = '/rkenterprises/index.php/member/showForm21ToPrint?invoiceid='+invoiceid;
   //alert("Form Submitted."+url);
     $.ajax({
            type: "GET",
            url: url,
            //data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('#showPddResultContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               //alert(ajaxdata);
                $('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                $('#showPddResultContent').html("Form 21 Loading Failed,Try Again.");
            }

        });
    
    
});

//*******************************************************************************************************

//**********************************************************************************************
//*****************************Show Delivery Challan to print***********************************************
//***********************************************************************************************

$('#vehicleContent').on('click','button[name="showDeliveryChallanBtn"]', function (e) {
    
     
    $('#showPddResultContent').html("");
    var invoiceid=($('#vehicleContent button[name=showDeliveryChallanBtn]').val());
    var url = '/rkenterprises/index.php/member/showChallanToPrint?invoiceid='+invoiceid;
   // alert("Form Submitted."+url);
     $.ajax({
            type: "GET",
            url: url,
            //data: formData,
            timeout: 5000,
            beforeSend: function () {
                $('#showPddResultContent').append('<div id="loading" class="text-center"><img src="/rkenterprises/assets/images/loader.gif" alt="Loading"/></div>');
            },
            complete: function () {
                $('#loading').remove();
            },
            success: function (ajaxdata) {
                //var image=data[0];
               // alert(ajaxdata);
                $('#showPddResultContent').html(ajaxdata);
            },
            fail: function () {
                $('#showPddResultContent').html("Challan Loading Failed,Try Again.");
            }

        });
    
    
});

//**************************************************************************************************
     
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

