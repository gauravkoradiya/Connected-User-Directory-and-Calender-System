<!doctype html>

<!-- See http://www.firepad.io/docs/ for detailed embedding docs. -->

<html>



<head>

  <meta charset="utf-8" />

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

  <script src="firepad-userlist.js"></script>

  <link rel="stylesheet" href="firepad-userlist.css" />



  <style>

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

</head>



<body onload="init()">


  <div id="userlist"></div>

  <div id="firepad"></div>



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

          { richTextToolbar: true, richTextShortcuts: true, userId: userId});



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

</body>

</html>
