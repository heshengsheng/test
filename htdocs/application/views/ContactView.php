<?php
require_once("templates/Common.php");

$common = new Common();
echo $common->header();
?>
<div id='contactPage'>
    <h4>About us</h4>
        <address>
            <strong>Hong Li, Ph.D. Associate Professor</strong><br />
            <strong>Email:</strong>&nbsp;<span>lihong01@sibs.ac.cn</span>
        </address>
        <address>
            <strong>BO Hu, Ph.D. Assistant Professor</strong><br/>
            <strong>Email:</strong>&nbsp;<span>bohu1120@hotmail.com</span>
        </address>
        <address>
            <strong>Sheng He, M.S. Candidate</strong><br />
            <strong>Email:</strong>&nbsp;<span>hesheng@picb.ac.cn</span>
        </address>
        <div>
            <a href="http://www.zs-hospital.sh.cn/e/intro/" target=_blank>Liver Cancer Institute & Zhong Shan Hospital, Fudan University</a>
            <br>
            <a href="http://www.picb.ac.cn/picb/" target=_blank>CAS-MPG Partner Institute for Computational Biology,&nbsp;SIBS,&nbsp;China</a><br />
        </div>
        <div style="margin-top:20px">
        </div>
</div>


<?php
echo $common->footer();