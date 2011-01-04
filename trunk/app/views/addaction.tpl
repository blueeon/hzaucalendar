<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加讲座</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="{@formaction}">
  <label>活动名称
  <input type="text" name="actname" id="actname" />
  </label>
  <p>
    <label>活动描述
    <textarea name="desc" id="desc" cols="45" rows="5"></textarea>
    </label>
  </p>
  <p>
    <label>开始时间
    <input type="text" name="startTime" id="startTime" />
    </label>
  </p>
  <p>
    <label>结束时间
    <input type="text" name="Endtime" id="Endtime" />
    </label>
  </p>
  <p>
    <label>活动详细地点
    <input type="text" name="Location" id="Location" />
    </label>
  </p>
   <p>
    <label>活动省份
    <input type="text" name="Province" id="Province" />
    </label>
  </p>
  <p>
    <label>活动市
    <input type="text" name="City" id="City" />
    </label>
  </p>
  <p>
    <label>活动类型
    <select name="selecttype1">
      <option>讲座</option>
    </select>
    </label>
    <label>
    <select name="selecttype2">
      <option>指导性讲座</option>
      <option>学术性讲座</option>
      <option>社会性讲座</option>
    </select>
    </label>
  </p>
  <p>
    <label>举办单位
    <input name="Organizers" type="text" id="Organizers" />
    </label>
  </p>
  <p>
    <label>备注
    <input name="Attention" type="text" id="Attention" />
    </label>
  </p>
  <p>
    <label>查看此活动需要消耗的分享币
    <input name="Spend" type="text" id="Spend" />
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="submit" id="submit" value="添加活动"/>
    </label>
  </p>
  <p>&nbsp; </p>
</form>
</body>
</html>
