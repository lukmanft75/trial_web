<?php
	function get_complete_name($id){
		global $db;
		$return = $db->fetch_single_data("indottech_photo_items","name",["id" => $id]);
		$parent_id = $db->fetch_single_data("indottech_photo_items","parent_id",["id" => $id]);
		if($parent_id > 0) $return = $db->fetch_single_data("indottech_photo_items","name",["id" => $parent_id])."-".$return;
		$parent_id = $db->fetch_single_data("indottech_photo_items","parent_id",["id" => $parent_id]);
		if($parent_id > 0) $return = $db->fetch_single_data("indottech_photo_items","name",["id" => $parent_id])."-".$return;
		return str_replace([" ","(",")"],["","-",""],$return);
	}
	
	function photo_items_list($id){
		global $db;
		$return = array();
		$indottech_photo_items = $db->fetch_all_data("indottech_photo_items",[],"parent_id = '".$id."'");
		$i=-1;
		foreach($indottech_photo_items as $photo_items_list){
			if($photo_items_list["is_childest"] == 1){
				$i++;
				$return[$i]["id"] = $photo_items_list["id"];
				$return[$i]["name"] = get_complete_name($photo_items_list["id"]);
			} else {
				$indottech_photo_items2 = $db->fetch_all_data("indottech_photo_items",[],"parent_id = '".$photo_items_list["id"]."'");
				foreach($indottech_photo_items2 as $photo_items_list2){
					if($photo_items_list2["is_childest"] == 1){
						$i++;
						$return[$i]["id"] = $photo_items_list2["id"];
						$return[$i]["name"] = get_complete_name($photo_items_list2["id"]);
					}
				}
			}
		}
		return $return;
	}
	
	function next_photo_item($group_ids,$current_id = 0){
		foreach($group_ids as $group_id){
			$arr = photo_items_list($group_id);
			if($current_id > 0){
				foreach($arr as $key => $data){
					if($data["id"] == $current_id){
						return $arr[$key+1]["id"];
						break;
					}
				}
			} else {
				return $arr[0]["id"];
			}
		}
		return $arr[0]["id"];
	}

	function prev_photo_item($group_ids,$current_id = 0){
		foreach($group_ids as $group_id){
			$arr = photo_items_list($group_id);
			foreach($arr as $key => $data){
				if($data["id"] == $current_id){
					return $arr[$key-1]["id"];
					break;
				}
			}
		}
		return $arr[count($arr)-1]["id"];
	}
	
?>