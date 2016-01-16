<div class="form-group">
    <label class="control-label" for="field_<?php echo $obj->id; ?>"><?php echo $obj->name; ?></label>
    <div class="">
        <?php if($obj->type == 'textarea'): ?>
            <textarea id="field_<?php echo $obj->id; ?>" name="<?php echo $obj->group.'-'.$obj->key; ?>" rows="5" class="form-control <?php echo $obj->valid ? 'valid' : NULL; ?>"><?php echo $obj->zna; ?></textarea>
        <?php elseif($obj->type == 'tiny'): ?>
            <textarea id="field_<?php echo $obj->id; ?>" name="<?php echo $obj->group.'-'.$obj->key; ?>" rows="5" class="tiny"><?php echo $obj->zna; ?></textarea>
        <?php elseif($obj->type == 'select'): ?>
            <?php $values = json_decode($obj->values, true); ?>
            <?php if(!$values): ?>
                <?php $values = array(); ?>
            <?php endif; ?>
            <select id="field_<?php echo $obj->id; ?>" class="form-control <?php echo $obj->valid ? 'valid' : NULL; ?>" name="<?php echo $obj->group.'-'.$obj->key; ?>">
                <?php foreach($values AS $v): ?>
                    <option value="<?php echo $v['value']; ?>" <?php echo $obj->zna == $v['value'] ? 'selected' : NULL; ?>><?php echo $v['key']; ?></option>
                <?php endforeach; ?>
            </select>
        <?php elseif($obj->type == 'radio'): ?>
            <?php $values = json_decode($obj->values, true); ?>
            <?php if(!$values): ?>
                <?php $values = array(); ?>
            <?php endif; ?>
            <div class="controls">
                <?php foreach($values AS $v): ?>
                    <label class="checkerWrap-inline radioWrap col-md-4" style="margin-right: 0;">
                        <input name="<?php echo $obj->group.'-'.$obj->key; ?>" value="<?php echo $v['value']; ?>" type="radio" <?php echo $obj->zna == $v['value'] ? 'checked' : ''; ?> class="<?php echo $obj->valid ? 'valid' : NULL; ?>">
                        <?php echo $v['key']; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        <?php elseif($obj->type == 'password'): ?>
            <input id="field_<?php echo $obj->id; ?>" autocomplete="off" class="form-control <?php echo $obj->valid ? 'valid' : NULL; ?>" type="password" name="<?php echo $obj->group.'-'.$obj->key; ?>" value="<?php echo $obj->zna; ?>"/>
            <span class="input-group-btn">
                <button class="btn showPassword" type="button">Показать</button>
            </span>
        <?php else: ?>
            <input id="field_<?php echo $obj->id; ?>" class="form-control <?php echo $obj->valid ? 'valid' : NULL; ?>" type="text" name="<?php echo $obj->group.'-'.$obj->key; ?>" value="<?php echo $obj->zna; ?>"/>
        <?php endif; ?>
    </div>
</div>