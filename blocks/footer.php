<?php
/**
 * ------------------------------------------------------------------------
 *  for J25 & J32
 * ------------------------------------------------------------------------
 * Copyright (C) Danny Li All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: Danny Li
 * ------------------------------------------------------------------------
 */

// No direct access
defined('_JEXEC') or die;
?>

<div class="ja-copyright">

	
    <jdoc:include type="modules" name="footer" />
</div>

<?php if($this->countModules('footnav')) : ?>
<div class="ja-footnav">
    <jdoc:include type="modules" name="footnav" />
</div>
<?php endif; ?>

<?php
$t3_logo = $this->getParam ('setting_t3logo', 't3-logo-light', 't3-logo-dark');
if ($t3_logo != 'none') : ?>
<div>
    
</div>
<?php endif; ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js"></script>