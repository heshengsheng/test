<?php
class Common{
    private $home = '';
    
    public function header($link = [],$scripts='')
    {
?>
<html>
    <head>
        <title>PDXliver</title>
<?php foreach ($link as $css) : ?>
        <link rel="stylesheet" href="<?=$this->home?>/static/css/<?=$css?>">
<?php endforeach; ?>
        <link rel="stylesheet" href="<?=$this->home?>/static/css/main.css">
        <script src="<?=$this->home?>/static/scripts/jquery.min.js"></script>
        <script src="<?=$this->home?>/static/scripts/main.js"></script>
        <?=$scripts?>
    </head>
    <body>
          <div id="grid">
              <div id="header">   
                   <img src="<?=$this->home?>/static/images/mouse.png"/>
                   <h2>PDXliver &nbsp;&nbsp;&nbsp;&nbsp;
                   <small>Patient-Derived Liver Cancer Xenografts</small></h2>
              </div>
              <div id="nav">
                  <ul>
                     <li><a href="<?=$this->home?>/home">Home</a></li>
                     <li><a href="<?=$this->home?>/browse">Browse</a></li>
                     <li><a href="<?=$this->home?>/search">Search</a></li>  
                     <li><a href="<?=$this->home?>/heatMap/twoDataSet">HeatMap</a></li>
                     <li><a href="<?=$this->home?>/Tools">Prediction</a></li>  
                     <li><a href="<?=$this->home?>/Documentation">Documentation</a></li>
                     <li><a href="<?=$this->home?>/Contact">Contact</a></li>
                  </ul>
              </div>
<?php
    }
    public function footer($link = [])
    {
?>
        <div id="footer">
            <p><a href="http://www.zs-hospital.sh.cn/e/intro/" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Key Lab of Computational Biology">
                     <strong>Liver Cancer Institute, Zhongshan Hospital, Fudan University</strong></a></p>
                    <p>
                            <a href="//www.picb.ac.cn/keylab.htm" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Key Lab of Computational Biology">
                                <strong>Key Lab of Computational Biology,</strong>
                            </a>&nbsp;
                            <a href="//www.picb.ac.cn/" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="CAS-MPG Partner Institute for Computational Biology">
                                <strong>PICB,</strong>
                            </a>&nbsp;
                            <a href="//english.sibs.cas.cn/" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Shanghai Institutes for Biological Sciences">
                                <strong>SIBS,</strong>
                            </a>&nbsp;
                            <a href="//english.cas.cn/" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chinese Academy of Sciences">
                                <strong>CAS</strong>
                            </a>
                        </p>
            <p>
               <a> <strong>Copyright &copy;</strong></a>
                <a href="//www.picb.ac.cn/yxlilab/?from=pfp" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Yixue Li Lab Homepage">
                    <strong>Yixue Li Lab</strong>
                </a>
            </p>
            </div>
          </div>
        <?php foreach ($link as $jss) : ?>
  <script src="/static/scripts/<?=$jss?>"></script><?php endforeach; ?>  
    </body>  
</html>
<?php
    }
    
    
}
