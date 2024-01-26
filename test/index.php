<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Insert multiple checkbox using jQuery AJAX in PHP MySqltitle>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">script>
<head>
  <body>
    <div class="container" style="margin-top: 50px;">
      <h2 class="text-center">Insert multiple checkbox using jQuery AJAX in PHP MySqlh2>
      <div class="row">
        <div class="col-md-3">div>  
        <div class="col-md-6" style="margin-top:20px; margin-bottom:20px;">
          <form id="formSubmit">
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="name" placeholder="Student Name"> 
            <div>
            <h5>Coursesh5>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="BCA"> BCA
              <label>
            <div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="MCA"> MCA
              <label>
            <div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="BBA"> BBA
              <label>
            <div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="BTECH"> BTECH
              <label>
            <div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="MTECH"> MTECH
              <label>
            <div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="BA"> BA
              <label>
            <div><br>
            <button type="submit" class="btn btn-primary">Submitbutton>
          <form>
        <div>
      <div>
    <div>

    <script type="text/javascript">
  $(document).ready(function(){
      $("#formSubmit").on("submit",function(e){
          e.preventDefault();
          var name = $("#name").val();
          var course = [];
          $(".form-check-input").each(function(){
              if ($(this).is(":checked")) {
                  course.push($(this).val());
              }
          });

          course = course.toString(); // toString function convert array to string
          
          if (name !=="" && course.length > 0) {
            $.ajax({
              url : "insert.php",
              type: "POST",
              cache: false,
              data : {name:name,course:course},
              success:function(result){
                if (result==1) {
                    $("#formSubmit").trigger("reset");
                    alert("Data insert in database successfully");
                }
              }
            });
          }else{
            alert("Fill the required fields");
          }
      });
  });
</script>
  <body>
<html>