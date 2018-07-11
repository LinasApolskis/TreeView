<ul id="pagePath">
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?module=<?php echo $module; ?>&action=list">Entries</a></li>
    <li><?php if(!empty($id)) echo "Edit"; else echo "New entry"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
    <?php if($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>
    <form action="" method="post">
        <fieldset>
            <legend>Info</legend>
            <p>
                <label class="field" for="id">ID<?php echo in_array('id', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="id" name="id" class="textbox textbox-150" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                <?php if(key_exists('id', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['id']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="name">Name<?php echo in_array('name', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="name" name="Name" class="textbox textbox-150" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                <?php if(key_exists('name', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['name']} simb.)</span>"; ?>
            </p>
            <p>
                <label class="field" for="parent_id">Parent id<?php echo in_array('parent_id', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="parent_id" name="parent_id">
                    <option value="-1">Parent id</option>
                    <?php
                    // išrenkame visas markes
                    $Trees = $TreeObj->getTreeList();
                    foreach($Trees as $key => $val) {
                        $selected = "";
                        if(isset($data['parent_id']) && $data['parent_id'] == $val['id']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id']}'>{$val['name']}</option>";
                    }
                    ?>
                </select>
            </p>
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submit button" name="submit" value="Išsaugoti">
        </p>
        <?php if(isset($data['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <?php } ?>
    </form>
</div>