function getDepartment(){checkFields();var theForm=document.forms['contactForm'];var department=theForm.elements['department'].value;if(department=='PaymentIssue'){$('.paymentIssueField').addClass('active');}
else if(department=='DMCAabuse'){$('.dmcaIssueField').addClass('active');}
else{return false;}}
function checkFields(){if($('.paymentIssueField').hasClass('active')||$('.dmcaIssueField').hasClass('active')){$('.paymentIssueField').removeClass('active');$('.dmcaIssueField').removeClass('active');}}