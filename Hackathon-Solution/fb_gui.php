<?php
include('connect.php');
include('header.php');
$query_dept="select * from department";
$sql_dept=mysqli_query($conn,$query_dept);
$query_desig="select * from designation";
$sql_desig=mysqli_query($conn,$query_desig);
?>
<!-- Firebase -->

<script src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>



<!-- CodeMirror -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.17.0/codemirror.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.17.0/codemirror.css" />



<!-- Firepad -->

<link rel="stylesheet" href="https://cdn.firebase.com/libs/firepad/1.4.0/firepad.css" />

<script src="https://cdn.firebase.com/libs/firepad/1.4.0/firepad.min.js"></script>



<!-- Include example userlist script / CSS.

     Can be downloaded from: https://github.com/firebase/firepad/tree/master/examples/ -->

<script src="firepad-userlist.php"></script>

<link rel="stylesheet" href="firepad-userlist.css" />



<style>
a.powered-by-firepad {
display: none !important;
}
  html { height: 100%; }

  body { margin: 0; height: 100%; }

  /* Height / width / positioning can be customized for your use case.

     For demo purposes, we make the user list 175px and firepad fill the rest of the page. */

  #userlist {

    position: absolute; left: 0; top: 0; bottom: 0; height: auto;

    width: 175px;

  }

  #firepad {

    position: absolute; left: 175px; top: 0; bottom: 0; right: 0; height: auto;

  }

</style>

<script type="text/javascript">
   jQuery(document).ready(function(){init()})</script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
            </div>
                <div class="row">
                  <div class="col-md-8 col-xs-8">
                    <div class="x_panel" style="min-height:1000px;">
                      <div class="x_title">
                        <h2>Add User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div id="userlist"></div>

                      <div id="firepad"></div>

                      <div class="x_content">
                        <!-- start form for validation -->



                        <script>

                          function init() {
                       var hash = <?php echo $_GET['meeting_code']; ?>
                            //// Initialize Firebase.

                            //// TODO: replace with your Firebase project configuration.

                            var config = {

                              apiKey: "AIzaSyC_JdByNm-E1CAJUkePsr-YJZl7W77oL3g",

                              authDomain: "firepad-tests.firebaseapp.com",

                              databaseURL: "https://firepad-tests.firebaseio.com"

                            };

                            firebase.initializeApp(config);



                            //// Get Firebase Database reference.

                            var firepadRef = getExampleRef(hash);



                            //// Create CodeMirror (with lineWrapping on).

                            var codeMirror = CodeMirror(document.getElementById('firepad'), { lineWrapping: true });



                            // Create a random ID to use as our user ID (we must give this to firepad and FirepadUserList).

                            var userId = Math.floor(Math.random() * 9999999999).toString();



                            //// Create Firepad (with rich text features and our desired userId).

                            var firepad = Firepad.fromCodeMirror(firepadRef, codeMirror,

                                { richTextToolbar: true, richTextShortcuts: true, userId: "<?php echo $_SESSION['id'];?>"});



                            //// Create FirepadUserList (with our desired userId).

                            var firepadUserList = FirepadUserList.fromDiv(firepadRef.child('users'),

                                document.getElementById('userlist'), userId);



                            //// Initialize contents.

                            firepad.on('ready', function() {

                              if (firepad.isHistoryEmpty()) {

                                firepad.setText('Check out the user list to the left!');

                              }

                            });

                          }



                          // Helper to get hash from end of URL or generate a random one.

                          function getExampleRef(hash) {


                            //var hash = window.location.hash.replace(/#/g, '');
                            var ref = firebase.database().ref(hash);

                            if (hash) {

                              ref = ref.child(hash);

                            } else {

                              ref = ref.push(hash); // generate unique location.

                              window.location = window.location + '#' + ref.key; // add it as a hash to the URL.

                            }

                            if (typeof console !== 'undefined') {

                              console.log('Firebase data: ', ref.toString());

                            }

                            return ref;

                          }

                        </script>

                      </div>
                    </div>


                  </div>
                  <div class="col-md-4 col-xs-4">

                    <h3>Colllabrative Pad  and Discussion</h3>

                    <div class="panel chat_view" style="min-height:500px">


                    </div>
                    <div >
                    <input type="text" name="chat_msg" id="chat_msg" class="form-group form-control">
                    <button type="button" class="btn btn-info" name="msg_send" id="msg_send">Send</button>

                  </div>







                </div>







          </div>
        </div>
        <script type="text/javascript">
          jQuery(document).ready(function(){
setInterval(function(){
            $.ajax({url:"chat_demo.php?id=<?php echo $_GET['meeting_code'];?>"}).done(function(data){
              $(".chat_view").html(data);
            });
},1000);
            jQuery("#msg_send").click(function(){
              $.ajax({url:"add_chat.php?from_id=<?php echo $_SESSION['id'];?>&meeting_id=<?php echo $_GET['meeting_code'];?>&message="+jQuery("#chat_msg").val()}).done(function(data){
                $.ajax({url:"chat_demo.php?id=<?php echo $_GET['meeting_code'];?>"}).done(function(data){
                  $(".chat_view").html(data);
                });
              });
            });
          });

        </script>
<?php include('footer.php'); ?>
