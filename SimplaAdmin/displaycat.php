<?php
    require_once "config.php";
   
    $sql="SELECT * FROM categories";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $output = "";
    if (mysqli_num_rows($result) > 0 ) {
        $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
        <thead>
              <tr>
                <th><input class="check-all" type="checkbox" /></th>
                <th>Category Id</th>
                <th>Category Name</th>
                <th width="100px">action</th>
              </tr>
              <tfoot>
            <tr>
              <td colspan="6">
                <div class="bulk-actions align-left">
                  <select name="dropdown">
                    <option value="option1">Choose an action...</option>
                    <option value="option2">Edit</option>
                    <option value="option3">Delete</option>
                  </select>
                  <a class="button" href="#">Apply to selected</a>
                </div>
                
                <div class="pagination">
                  <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
                  <a href="#" class="number" title="1">1</a>
                  <a href="#" class="number" title="2">2</a>
                  <a href="#" class="number current" title="3">3</a>
                  <a href="#" class="number" title="4">4</a>
                  <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
                </div> <!- End .pagination 
                <div class="clear"></div>
              </td>
            </tr>
          </tfoot>
        </thead>';
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= "<tbody><tr>
                <td><input type='checkbox' /></td>
                <td align='center'>{$row["cid"]}</td>
                <td>{$row["cname"]}</td>   
                <td>
                <button class='edit' name='edtbtn' data-eid=".$row['cid']."'><img src='resources/images/icons/pencil.png' alt='Edit'/></button>
                <button class='delete' name='dltbtn' data-id=".$row['cid']."'><img src='resources/images/icons/cross.png' alt='Edit Meta' /></button>
                </td></tr>
                <tbody>";
                    
                    

        }
        $output .= "</table>";

        //mysqli_close($conn);

        echo $output;
    } else {
        echo "<h2>No Record Found.</h2>";
    }


