$( document ).ready(function() {
    console.log( "ready!" );
    var allClasses = ['projectManagmentContent' , 'BusinessAnalysisContent' , 'ManagementSkillContent' , 'CustmizedContent'];
    for(let i=1;i<allClasses.length;i++){
        $('.'+allClasses[i]).hide();
      }
    $('.Service').click(function(){
       
        $(this).addClass('Active2');
        $(this).parent().siblings().children().removeClass('Active2');
        //console.log($(this).attr('id')+'Content');
        var currentClass = $('.'+$(this).attr('id')+'Content');

        for(let i=0;i<allClasses.length;i++){
          $('.'+allClasses[i]).hide();
        }
        $(currentClass).show();
        // $(('.'+$(this)+'Content')).hide()


    });
});