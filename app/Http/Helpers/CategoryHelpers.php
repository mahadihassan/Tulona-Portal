<?php
use App\Category;

/*Start New Function
This Function Create List Category Show.*/

function cat($data, $i){
    $category =Category::all();
    foreach ($category as $key => $value) {
       	if($value->id == $data){
            $name = $value->name;
            if($i<1)
            {
                echo $name;
            }
            else{
                echo ">>".$name;
            } 
            $i++;      
            $data = $value->category_id;
            cat($data, $i);
        }
        else
        {

        }

    }
}

//End Function

/* Start New Function 
This Function Create Category List Parent Category Show .*/


function parentcategory($data){
    $category =Category::all();
    foreach ($category as $key => $value) {
        if($value->id == $data){
            $parentname = $value->name;
            echo($parentname);
        }
    }
}

//End Function


/*Start New Function.
 This Function Create Category Input Box Parent Category.*/

function fetchCategoryTree($parent, $spacing, $user_tree_array) {
    if (!is_array($user_tree_array))
        $user_tree_array = array();
        $sql = DB::select("SELECT `id`, `name`, `category_id` FROM `categories` WHERE `category_id` =$parent ORDER BY id ASC");
        if ($sql > 0) {
            foreach($sql as $row){
                $user_tree_array[] = array("id" => $row->id, "name" => $spacing.$row->name);
                $user_tree_array = fetchCategoryTree($row->id, $spacing.'&nbsp;&nbsp;', $user_tree_array);
                }
            }
        return $user_tree_array;
    }

    //End Function