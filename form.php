
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <legend>Search for Customers</legend>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name">
    </div>


    <div class="form-group">
        <label for="sex">Sex:</label>
        <select name="sex">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>

    <br/>
    <br/>

</form>