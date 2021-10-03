$(function (){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#MemberImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#PhotoInput").change(function() {
        readURL(this);
    });
    $('.settingItem').click(function(){
      $(this).addClass('selected');
      $(this).siblings(".settingItem").removeClass('selected');
    });

    let array = ['personal-skill' , 'Noti-personal'];
        for(let i=0;i<array.length;i++){
            $('.'+array[i]).hide();
        }
    $('.settingItem').click(function(){
        array = ['personal-Info' , 'personal-skill' , 'Noti-personal'];
        for(let i=0;i<array.length;i++){
            $('.'+array[i]).fadeOut(1000);
        }
        let className = ".personal-"+ $(this).attr('class').split(" ")[1];
        $(className).fadeIn(1000);
    });
    let skills = new Array(); 
    let userSkills = [];
    function putCartona(one){
        let cartona = ``;
        for(let i=0;i<one.length;i++){
            if(userSkills.indexOf(one[i])==-1){
                cartona+= `<div index="${i}" class="skillOne w-100  p-1 my-1 d-flex  align-items-center"><p class="d-flex  align-items-center">${one[i]}</p></div>`;
            }else{continue}
        }
        document.querySelector('.skilldetails').innerHTML = cartona;
    }
    $.ajax({
        type: 'get',
        url: '/Skills/getSkills',
        success:function(one , two , three){
        for(let i=0;i<one.length;i++){
            skills.push(one[i].Name);
        }
        putCartona(skills);
    },
});
$('body').on( 'click', '.skillOne' , function(){
    let index = $(this).attr('index');
    $("#skillSpan .skills").append(`
        <span index="${index}" class='btn btn-info m-1 btn-sm'>
            <span class="span1">${$(this).text()}</span>
            <span class='deleteSkill'>x</span>
        </span>
        `);
        userSkills.push(skills[index]);
        $(this).remove();
        console.log(userSkills);
    });
    $("body").on("click", ".deleteSkill", function(){
        let value = $(this).siblings(".span1").text();
        let ind = userSkills.indexOf(value);
        alert("Value : "+value);
        skills.push(value);
        userSkills.splice(ind , 1);
        $(this).parent().remove();
        console.log(userSkills);
        putCartona(skills);
    });
    $('.searchSkill').keyup(function(){
        let teram = $(this).val();
        let filteredData = [];
        for(let i=0;i<skills.length;i++){
            if(skills[i].toLowerCase().includes(teram.toLowerCase())){
                filteredData.push(skills[i]);
            }
        }
        console.log(userSkills);
        putCartona(filteredData);
    });
    $.ajax({
        type: 'get',
        url:'/Skills/getUserSkills',
        success:function(one){
            console.log(one);
            one = one[0].Skills.split("-");
            for(let i=0;i<one.length;i++){
                userSkills.push(one[i]);
                $("#skillSpan .skills").append(`
                <span index="${i}" class='btn btn-info m-1 btn-sm'>
                    <span class="span1">${one[i]}</span>
                    <span class='deleteSkill'>x</span>
                </span>
                `);
            }
            putCartona(skills);
        },
        error:function(){
            console.log("Error");
            alert("Error");
        },
    });
    if(document.querySelector("#SaveSkills")!=null){
        document.querySelector("#SaveSkills").addEventListener("click" , ($event)=>{
            let $userSkill = userSkills.join("-");
            document.querySelector("#skillInput").value = $userSkill;
        });
}
});