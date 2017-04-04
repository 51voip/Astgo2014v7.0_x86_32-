<?php /* Smarty version 2.6.26, created on 2014-10-31 00:17:43
         compiled from rate_edit.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css"/>
<title>编辑费率</title>
<script src="./js/jquery-1.6.2.min.js"></script>

<script>
	//所有input 去空格
	function trim_all_input()
	{
		var inpus = document.getElementsByTagName("INPUT")
        for(var i=0; i<inpus.length; i++)
        {
            if(inpus[i].type=="text")
            {
               inpus[i].value =  inpus[i].value.replace(/\s/g,"");
            }
        }
		
	}
	
	// 提交前检测输入是否合法
	function check()
	{
		trim_all_input(); //所有input 去空格
			
		if (document.form1.prefixname.value==""  )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确费率名称</font></span></div>";
      		document.form1.prefixname.focus();
			return false;
		}		
		if (document.form1.prefix.value=="")
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确费率前缀字冠</font></span></div>";
      		document.form1.prefix.focus();
			return false;
		}			
		if (document.form1.rateprice.value==""  || ( isNaN(document.form1.rateprice.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确的单价</font></span></div>";
      		document.form1.rateprice.focus();
			return false;
		}	
		if (document.form1.payunitsecond.value=="" || ( isNaN(document.form1.payunitsecond.value) ) )
		{
			document.getElementById("userTip").innerHTML="<div align='center'><span class='STYLE4'><font color=red>请输入正确计费周期</font></span></div>";
      		document.form1.payunitsecond.focus();
			return false;
		}					
	
		return true;

	}

	function goback(curpage,rategroupid,old_curpage,agent_id)
	{
		var gotourl = '?action=list&curpage='+curpage+'&rategroupid='+rategroupid+'&old_curpage='+old_curpage+'&agent_id='+agent_id; 
		//alert(gotourl);
	    document.form2.action = gotourl;
		document.form2.submit();
	}

    </script>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="2%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="98%" valign="bottom"><span class="table_caption"> <?php if ($this->_tpl_vars['action'] == 'edit_post'): ?> 修改费率 <?php elseif ($this->_tpl_vars['action'] == 'add_post'): ?> 新增费率<?php else: ?>费率管理<?php endif; ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="table_caption">
              </span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
     
      <td><table width="605" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
     
           	
          <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>

          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >所属费率组</span></td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE1"><?php echo $this->_tpl_vars['rategroup']['rategroupname']; ?>
</span></td>
          </tr>
          <?php if ($this->_tpl_vars['action'] == 'add_post'): ?>
          <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">批量导入费率</span></div></td>
          </tr>
		  
	
          <form enctype="multipart/form-data" method="post" name="uploadfile_post" action="?action=uploadfile_post&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
" target="_self">
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span class="STYLE1">费率文件</span></td>
            <td height="18" bgcolor="#FFFFFF">&nbsp;
              <input name="src" type="file" class="STYLE1" />
              <input  type= "submit"  class="STYLE1"   name="button" id="button2"   value="上传"></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE4">费率文件格式:费率名称,前缀,单价,计费周期 </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE4">国内移动手机,138,0.09,60</span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF">&nbsp;</td>
            <td height="18" bgcolor="#FFFFFF"><span class="STYLE4">国内联通手机,186,0.08,60</span></td>
            </tr>
         </form>
         <?php endif; ?>
          <tr>
            <td height="18" colspan="2" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">建立单个费率</span></div></td>
          </tr>
          
		  	    <form name="form2" method="post" >
           </form>
		   
           <form name="form1" method="post" action="?action=<?php echo $this->_tpl_vars['action']; ?>
&id=<?php echo $this->_tpl_vars['rate']['decode_id']; ?>
&curpage=<?php echo $this->_tpl_vars['curpage']; ?>
&old_curpage=<?php echo $this->_tpl_vars['old_curpage']; ?>
&rategroupid=<?php echo $this->_tpl_vars['rategroupid']; ?>
&agent_id=<?php echo $this->_tpl_vars['agent_id']; ?>
">
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >费率名称</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="prefixname" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['prefixname']; ?>
' />
                </span></td>
          </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >费率前缀</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="prefix" type="text" class="STYLE1" style="height:18px; width:125px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['prefix']; ?>
' />
              </span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >单价</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="rateprice" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['rateprice']; ?>
' />
                <span class="STYLE1">元</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >计费周期</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="payunitsecond" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['payunitsecond']; ?>
' />
                <span class="STYLE1">秒</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >免费时长</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="notpaysecond" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['notpaysecond']; ?>
' />
                <span class="STYLE1">秒</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >附加费</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="surchargenum" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['surchargenum']; ?>
' />
                <span class="STYLE1">元</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >首时段计费</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="firsttimelong" type="text" class="STYLE1" id="firsttimelong" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['rate']['firsttimelong']; ?>
' size="30" />
                <span class="STYLE1">秒内按计费周期</span>
                <input name="firstpayunitsecond" type="text" class="STYLE1" id="firstpayunitsecond" style="height:18px; width:60px;"  value='<?php echo $this->_tpl_vars['rate']['firstpayunitsecond']; ?>
' size="30" />
                <span class="STYLE1">秒计费</span></span></td>
            </tr>
          <tr>
            <td height="18" align="right" bgcolor="#FFFFFF"><span   class="STYLE1" >次时段计费</span></td>
            <td height="18" bgcolor="#FFFFFF">
              <span class="STYLE7">
                <input name="sencondtimelong" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['sencondtimelong']; ?>
' />
                <span class="STYLE1">秒内按计费周期</span>
                <input name="sencondpayunitsecond" type="text" class="STYLE1" style="height:18px; width:60px;" size="30"  value='<?php echo $this->_tpl_vars['rate']['sencondpayunitsecond']; ?>
' />
                <span class="STYLE1">秒计费</span></span></td>
            </tr>
  
  
          <tr>
            <td id="userTip" height="18" colspan="2" align="right" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td height="18" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit"  class="STYLE1"   name="submitbtn" id="submitbtn"   onClick="return check()" value=" 确认提交 ">
              <input  type="button"  class="STYLE1"   name="backbutton" id="button"   onClick="goback('<?php echo $this->_tpl_vars['curpage']; ?>
','<?php echo $this->_tpl_vars['rategroupid']; ?>
','<?php echo $this->_tpl_vars['old_curpage']; ?>
','<?php echo $this->_tpl_vars['agent_id']; ?>
')" value=" 取消返回 "></td>
          </tr>
        </form>
    </table></td>
  </tr>

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>

            <td width="35">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p class="STYLE19">&nbsp;</p>
</body>
</html>