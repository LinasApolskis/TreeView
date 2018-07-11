<ul id="pagePath">
	<li><a href="index.php">Home</a></li>
	<li>Iterative tree</li>
</ul>
<div id="actions">
	<a href='index.php?module=tree&action=create'>New entry</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>Name</th>
		<th></th>
	</tr>
	<?php
    /*
    $current = -1;
    $printed = array();
    while(count($data) != count($printed)+4) {
        foreach ($data as $key => $val) {
            if ($current == $val['parent_id'] && !in_array($val['id'], $printed)) {
                echo in_array($val['id'], $printed);
                echo
                    "<tr>"
                    . "<td>{$val['name']}</td>"
                    . "<td>"
                    . "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;' title=''>del</a>&nbsp;"
                    . "<a href='index.php?module={$module}&action=edit&id={$val['id']}' title=''>edit</a>"
                    . "</td>"
                    . "</tr>";
                $current = $val['id'];
                $printed[] = $val['id'];
            }
            else $current = -1;
        }
    }
    */
	?>
Table view
<?php
function generatePageTree2($data, $parent = -1, $depth=0){
    $ni=count($data);
    if($ni === 0 || $depth > 1000) return ''; // Make sure not to have an endless recursion
    $tree = "<ul>";
    for($i=0; $i < $ni; $i++){
        if($data[$i]['parent_id'] == $parent){
            $str = str_repeat('- ',$depth);
            echo
                "<tr>"
                . "<td>{$str} {$data[$i]['name']}</td>"
                . "<td>"
                . "<a href='#' onclick='showConfirmDialog(\"tree\", \"{$data[$i]['id']}\"); return false;' title=''>del</a>&nbsp;"
                . "<a href='index.php?module=tree&action=edit&id={$data[$i]['id']}' title=''>edit</a>"
                . "</td>"
                . "</tr>";
            $tree .= str_repeat("-",$depth);
            $tree .= $data[$i]['name'];
            $tree .= generatePageTree2($data, $data[$i]['id'], $depth+1);
        }
    }
    return $tree;
}
generatePageTree2($data);
?>
</table>
</br>
Dump view
</br>
<div>
<?php
function generatePageTree($data, $parent = -1, $depth=0){
$ni=count($data);
if($ni === 0 || $depth > 1000) return ''; // Make sure not to have an endless recursion
$tree = "<ul>";
    for($i=0; $i < $ni; $i++){
    if($data[$i]['parent_id'] == $parent){
        $tree .= str_repeat("-",$depth);
        $tree .= $data[$i]['name'];
        $tree .= generatePageTree($data, $data[$i]['id'], $depth+1);
    }
    }
return $tree;
}

echo(generatePageTree($data));

function convert(array $list)
{
    $indexed = array();
    // first pass - get the array indexed by the primary id
    foreach ($list as $key => $val) {
//    foreach ($list as $row) {
        $indexed[$val['id']]            = $val;
        $indexed[$val['id']]['children'] = [];
    }
    // second pass
    $root = [];
    foreach ($indexed as $id => $row) {
        $indexed[$row['parent_id']]['children'][$id] = &$indexed[$id];
            $root[$id] = &$indexed[$id];

    }
    return $root;
}
    $tree = convert($data);
print "<pre>";
print_r($tree);
print "</pre>";
?>
</div>
