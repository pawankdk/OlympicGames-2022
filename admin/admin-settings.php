<?php

require_once 'assets/php/admin-header.php';
?>

<style>
  body {
    background: #ecf0f1;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 16px;
  }

  .holder {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
    margin: 100px auto;
    padding: 30px 20px 20px;
    width: 400px;
  }

  td {
    border-bottom: 1px solid #f6f6f6;
    padding: 5px 10px;
  }

  td:nth-child(2) {
    text-align: right;
    width: 40px;
  }

  tr:last-child td {
    border: none;
    padding: 30px 10px 10px;
    text-align: center;
  }

  input[type=checkbox] {
    cursor: pointer;
    height: 30px;
    margin: 4px 0 0;
    position: absolute;
    opacity: 0;
    width: 30px;
    z-index: 2;
  }

  input[type=checkbox]+span {
    background: #e74c3c;
    border-radius: 50%;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
    display: inline-block;
    height: 30px;
    margin: 4px 0 0;
    position: relative;
    width: 30px;
    transition: all .2s ease;
  }

  input[type=checkbox]+span::before,
  input[type=checkbox]+span::after {
    background: #fff;
    content: '';
    display: block;
    position: absolute;
    width: 4px;
    transition: all .2s ease;
  }

  input[type=checkbox]+span::before {
    height: 16px;
    left: 13px;
    top: 7px;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }

  input[type=checkbox]+span::after {
    height: 16px;
    right: 13px;
    top: 7px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  input[type=checkbox]:checked+span {
    background: #2ecc71;
  }

  input[type=checkbox]:checked+span::before {
    height: 9px;
    left: 9px;
    top: 13px;
    -webkit-transform: rotate(-47deg);
    transform: rotate(-47deg);
  }

  input[type=checkbox]:checked+span::after {
    height: 15px;
    right: 11px;
    top: 8px;
  }

  input[type=submit] {
    background-color: #2ecc71;
    border: 0;
    border-radius: 4px;
    color: #FFF;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    text-align: center;
    padding: 12px 20px 14px;
  }
</style>


<div class="row">


  <div class="holder">
    <table width="100%">
      <tr>
        <td>Handle Users</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>Reply Feedback</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>Remove Notifications</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>Unblock Users</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>Post to Website</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td>Exports Users List</td>
        <td>
          <div>
            <input type="checkbox" checked="" />
            <span></span>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" value="Save Settings" onclick="admin-settings.php">
        </td>
      </tr>
    </table>
  </div>




</div>


</div>
</div>
</div>

<!-- jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" defer></script>


<script type="text/javascript">
  $(document).ready(function() {
    $("#open-nav").click(function() {
      $(".admin-nav").toggleClass('animate');
    });


    //check Notification
    checkNotification();

    function checkNotification() {
      $.ajax({
        url: 'assets/php/admin-action.php',
        method: 'post',
        data: {
          action: 'checkNotification'
        },
        success: function(response) {
          $("#checkNotification").html(response);
        }
      });
    }
  });
</script>
</body>

</html>