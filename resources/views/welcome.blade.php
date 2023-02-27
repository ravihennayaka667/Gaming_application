
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIBA Campus | Gaming Competition</title>
    <link rel="icon" type="image/x-icon" href="Images/fav.png'">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="{{ asset('css/cuss.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
   

   <script src="js/jquery.js"></script>
   
</head>

<body onload="loadFuncttion()">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="login-box">
                <h2>INNOVIOR 2<span>K</span>23 Gaming Competition</h2>
                <form id="std_form">
                    <div class="user-box" >
                        <input type="text" name="team_name" id="team_name" required>
                        <label>Team Name</label>
                        <select name="gameCategory" id="gameCategory" onchange="hideFunction()">
                            <option value="0" style="color:black">Select game Category</option>
                            <option value="1" style="color:black">Main Game </option>
                            <option value="2" style="color:black">Mini Game(free fire)</option>
                        </select>
                        <select name="gameName" id="gameName">
                            <option value="0" style="color:black">Select Main Game</option>
                            <option value="1" style="color:black">PUBG </option>
                            <option value="2" style="color:black">COD 4</option>
                        </select>


                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="team_leader_name" id="team_leader_name" required placeholder="Team Leader Name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="phone" id="phone" required placeholder="Phone Number">
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" id="email" required placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="team_member_2" id="team_member_2" required placeholder="Team Member 2 Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="team_member_3" id="team_member_3" required placeholder="Team Member 3 Name">
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <input type="text" name="team_member_4" id="team_member_4" required placeholder="Team Member 4 Name">
                               
                            </div>
                            <div class="col-md-6">
                               
                                <input type="text" name="team_member_5" id="team_member_5" required placeholder="Team Member 5 Name">
                            </div>

                        </div>
                     
                        <a href="#" id="submitBtn">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Submit
                        </a>
                        <a href="#" id="ClearBtn">
                            Clear
                        </a>
                    </div>
           	 </div>
            </form>
        </div>
    </div>
    

</body>

</html>


<script>

    function loadFuncttion(){
        gameName.style.display = "none";
    }

    function hideFunction(){
        var gameName = document.getElementById("gameName");
        var category = document.getElementById("gameCategory").value;
        if(category == 1){
            gameName.style.display = "block";
        }else{
            gameName.style.display = "none";
        }
    }

  $('#submitBtn').click(function () { 
        
        var team_name = $('#team_name').val();
        var team_leader_name = $('#team_leader_name').val();
        var phone_1 = $('#phone').val();
        var email = $('#email').val();
        var team_member_2 = $('#team_member_2').val();
        var team_member_3 = $("#team_member_3").val();
        var team_member_4 = $("#team_member_4").val();
        var team_member_5 = $("#team_member_5").val();

        var gameCategory= $("#gameCategory").val();
        var gameName= $("#gameName").val();

        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var letterNumber = /^[a-zA-Z]+$/;

        if(team_name == "" || team_leader_name == "" || phone_1 == "" || email == "" || team_member_2 == "" || team_member_3 == "" || team_member_4 == "" || team_member_5 == "" || gameCategory  == 0){
           alert("please Fill All Input Fields!"); 
        }
        else if( phone_1.length<=9 ){
            // phone_1.match(letterNumber)
            alert("please Check Your Phone Number!");
        
         }else if(phone_1.length>11){
            alert("Pleace Check Your Phone Number!");
         }else if(!email.match(validRegex)){
            alert("please Check Your Email Adderss!");
        }
        else{
            var form = $('#std_form')[0];
             var formData = new FormData(form);
      
        $.ajax({
            url: "lib/routes/game/saveGame.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                alert(data);
                location.reload();
            },
            error: function () {
                
            }
        });
        }
    });
    $('#ClearBtn').click(function(){
        $('input[type="text"]').val('');
        $('input[type="email"]').val('');
        $('#gameCategory option:eq(0)').attr('selected','selected'); 
        $('#gameName option:eq(0)').attr('selected','selected'); 
    });
</script>
