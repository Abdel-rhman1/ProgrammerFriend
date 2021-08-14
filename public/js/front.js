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

    let stars = document.querySelectorAll(".Ranking i");
    let resetRank = document.getElementById("restRanking");
    let rankingInput = document.getElementById("ranking");
    console.log(stars);

    for(let i=0;i<stars.length;i++){
      stars[i].addEventListener("click" , function(){
          
          rankingInput.value = i+1;
          evaluteCourse(i);
      });
    }
    function evaluteCourse (starNumber){
        for(let j = 0 ; j<=starNumber;j++){
            stars[j].style.color = "gold";
        }
    }
    resetRank.addEventListener("click" , function(){
      for(let j = 0 ; j<5;j++){
        stars[j].style.color = "#000";
    }
    });

});


