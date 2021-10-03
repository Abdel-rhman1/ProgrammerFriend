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
    $("restRanking").click(function(){
        for(let j = 0 ; j<5;j++){
          stars[j].style.color = "#000";
        } 
    });

    function generateRandom(length){
      let randomChars = 'ABCDEFGHJIKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_-+=}{}|';
      let res="";
      for(let i=0;i<length;i++){
        res+=randomChars.charAt(Math.floor(Math.random()*randomChars.length));
       
      }
      return res;
    }
    $('.selected').click(function(){
      alert("Hello");
      $(this).addClass('selected');
      $(this).siblings("selected").removeClass('selected');
    });
    $("#generateCubon").click(function(e){
      e.preventDefault();
      $('#code').val(generateRandom(15));
    })
    
});


