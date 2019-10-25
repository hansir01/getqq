
/****
 * For CNZZ.com
 *
 * Last Modified: Mon, 12 Mar 2007 12:01:10 +0800
 **/

var Provinces = document.getElementById('provinces');
var Cities = document.getElementById('cities');

function Location(Province, City)
{
	this.Province	= Province;
	this.City		= City;
}

// Construct the location data
var arrLocation = new Array(35);
arrLocation[0]	= new Location('请选择地区', '');
arrLocation[1]	= new Location('北京市', '北京市');
arrLocation[2]	= new Location('上海市', '上海市');
arrLocation[3]	= new Location('天津市', '天津市');
arrLocation[4]	= new Location('重庆市', '重庆市');
arrLocation[5]	= new Location('河北省', '石家庄|邯郸市|保定市|张家口|承德市|唐山市|廊坊市|沧州市|衡水市|邢台市|秦皇岛');
arrLocation[6]	= new Location('山西省', '太原市|长治市|大同市|晋城市|晋中市|临汾市|吕梁市|朔州市|忻州市|阳泉市|运城市');
arrLocation[7]	= new Location('内蒙古自治区', '呼和浩特|阿拉善|巴彦淖尔盟|包头市|赤峰市|鄂尔多斯|呼伦贝尔|呼盟扎兰屯市|通辽市|乌海市|锡林郭勒盟|兴安盟|乌兰察布');
arrLocation[8]	= new Location('辽宁省', '沈阳市|鞍山市|本溪市|朝阳市|大连市|丹东市|抚顺市|阜新市|葫芦岛|锦州市|辽阳市|盘锦市|铁岭市|营口市');
arrLocation[9]	= new Location('吉林省', '长春市|吉林市|白城市|白山市|辽源市|四平市|松原市|通化市|延边州');
arrLocation[10]	= new Location('黑龙江省', '哈尔滨|大庆市|大兴安岭市|鹤岗市|黑河市|鸡西市|佳木斯|牡丹江|七台河|齐齐哈尔|双鸭山|绥化市|伊春市');
arrLocation[11]	= new Location('江苏省', '南京市|苏州市|常州市|淮安市|连云港|南通市|宿迁市|泰州市|无锡市|徐州市|盐城市|扬州市|镇江市');
arrLocation[12]	= new Location('浙江省', '杭州市|绍兴市|湖州市|嘉兴市|金华市|丽水市|宁波市|衢州市|绍兴市|台州市|温州市|舟山市');
arrLocation[13]	= new Location('安徽省', '合肥市|蚌埠市|芜湖市|安庆市|阜阳市|黄山市|滁州市|亳州市|巢湖市|池州市|淮北市|淮南市|六安市|马鞍山市|宿州市|铜陵市|宣城市');
arrLocation[14]	= new Location('福建省', '福州市|厦门市|宁德市|莆田市|泉州市|漳州市|龙岩市|三明市|南平市');
arrLocation[15]	= new Location('江西省', '南昌市|抚州市|赣州市|吉安市|景德镇|九江市|萍乡市|上饶市|新余市|宜春市|鹰潭市');
arrLocation[16]	= new Location('山东省', '济南市|菏泽市|青岛市|淄博市|德州市|烟台市|潍坊市|济宁市|泰安市|临沂市|滨州市|东营市|威海市|枣庄市|日照市|莱芜市|聊城市');
arrLocation[17]	= new Location('河南省', '郑州市|安阳市|鹤壁市|焦作市|开封市|洛阳市|漯河市|南阳市|平顶山|濮阳市|三门峡|商丘市|新乡市|信阳市|许昌市|周口市|驻马店|济源市');
arrLocation[18]	= new Location('湖北省', '武汉市|鄂州市|黄冈市|黄石市|十堰市|随州市|咸宁市|襄樊市|孝感市|宜昌市|荆州市|荆门市|恩施市|仙桃市');
arrLocation[19]	= new Location('湖南省', '长沙市|常德市|郴州市|衡阳市|怀化市|娄底市|邵阳市|湘潭市|益阳市|永州市|岳阳市|张家界|株洲市|湘西州');
arrLocation[20]	= new Location('广东省', '广州市|汕尾市|阳江市|揭阳市|茂名市|江门市|韶关市|惠州市|梅州市|汕头市|深圳市|珠海市|佛山市|肇庆市|湛江市|中山市|清远市|云浮市|潮州市|东莞市|河源市');
arrLocation[21]	= new Location('广西壮族自治区', '南宁市|柳州市|玉林市|北海市|桂林市|贵港市|百色市|崇左市|防城港市|河池市|贺州市|来宾市|钦州市|梧州市');
arrLocation[22]	= new Location('海南省', '海口市|三亚市|五指山市|琼海市|儋州市|文昌市|万宁市|东方市|通什市');
arrLocation[23]	= new Location('四川省', '成都市|阿坝州|巴中市|达州市|德阳市|广安市|广元市|乐山市|凉山市|泸州市|眉山市|绵阳市|内江市|南充市|攀枝花|遂宁市|雅安市|宜宾市|资阳市|自贡市|甘孜州');
arrLocation[24]	= new Location('贵州省', '贵阳市|遵义市|安顺市|黔南市|黔东南|铜仁市|毕节市|六盘水|黔西南');
arrLocation[25]	= new Location('云南省', '昆明市|保山市|楚雄市|大理市|德宏市|迪庆市|红河市|丽江市|临沧市|怒江市|曲靖市|文山市|西双版纳|玉溪市|昭通市|普洱市');
arrLocation[26]	= new Location('西藏自治区', '拉萨市|日喀则|林芝市|昌都市|那曲市|阿里市|山南市');
arrLocation[27]	= new Location('陕西省', '西安市|安康市|宝鸡市|汉中市|商洛市|铜川市|渭南市|咸阳市|延安市|榆林市');
arrLocation[28]	= new Location('甘肃省', '兰州市|平凉市|张掖市|酒泉市|嘉峪关|天水市|白银市|定西市|甘南藏族自治州|金昌市|临夏市|陇南市|庆阳市|武威市');
arrLocation[29]	= new Location('宁夏回族自治区', '银川市|固原市|石嘴山|吴忠市|中卫市');
arrLocation[30]	= new Location('青海省', '西宁市|玉树市|海东地区|海北州|黄南州|海南州|果洛州|海西州');
arrLocation[31]	= new Location('新疆维吾尔自治区', '乌鲁木齐|哈密市|和田市|阿勒泰|克拉玛依|石河子|昌吉市|吐鲁番|阿克苏|喀什市|塔城市|克孜勒苏柯尔克孜|巴音郭楞|博尔塔拉');
arrLocation[32]	= new Location('香港特别行政区', '香港');
arrLocation[33]	= new Location('澳门特别行政区', '澳门');
arrLocation[34]	= new Location('台湾省', '台北市|高雄市|台南市|台中市|基隆市|彰化市|新竹市|嘉义市|台东市|花莲市|宜兰市');
arrLocation[35] = new Location('国外', '国外');

/*
 * Website Categories
 */
var Types		= document.getElementById('type');
var Subtypes	= document.getElementById('subtype');

function Categories(Type, Subtype)
{
	this.Type		= Type;
	this.Subtype	= Subtype;
}

// Construct the category data
var arrCategories = new Array(10);

arrCategories[0]	= new Categories('请选择网站类型', '');
arrCategories[1]	= new Categories('娱乐类', '聊天|体育|文学|图片|交友|图铃|音乐|娱乐综合|游戏|网页游戏|电影|军事|娱乐其它|动漫|视频|星相|彩票博彩|flash|幽默笑话');
arrCategories[2]	= new Categories('IT网络', 'IT网络其它|IT资讯|网址导航|下载|地方信息港|搜索引擎|网站制作|电脑软件');
arrCategories[3]	= new Categories('教育人才', '科普|办公文教|教育培训|招聘|留学移民|教育人才其它');
arrCategories[4]	= new Categories('医疗医学', '医学医药|两性健康|医疗器械|整形美容');
arrCategories[5]	= new Categories('百姓生活', '艺术爱好|旅游|房产|家居装饰|礼品玩具|服装服饰|食品饮食|家电数码|酒店机票预订|百姓生活其它|生活/时尚|SNS|汽车');
arrCategories[6]	= new Categories('经济商贸', '团购与团购导航|招商加盟|B2C商城|B2B商城|财经证券|交通物流');
arrCategories[7]	= new Categories('行业类', '企业|机械设备|电子电工|化工能源|冶金矿产|农林牧渔|新闻门户|政府组织');
arrCategories[8]	= new Categories('论坛博客', '论坛其它|博客|微博|IT论坛|汽车论坛|教育论坛|军事论坛|体育论坛|旅游论坛|经济论坛|综合论坛');
arrCategories[9]	= new Categories('其它类', '其他');

var corresponding = new Array(10);corresponding['请选择网站类型'] = 0;corresponding['娱乐类'] = 1;corresponding['IT网络'] = 2;corresponding['教育人才'] = 3;corresponding['医疗医学'] = 4;corresponding['百姓生活'] = 5;corresponding['经济商贸'] = 6;corresponding['行业类'] = 7;corresponding['论坛博客'] = 8;corresponding['其它类'] = 9;

/*
 * 执行函数
 */
function selectedCity()
{
	var selected = Provinces.options[Provinces.selectedIndex].value;
	var arrCities = (arrLocation[selected].City).split("|");
	Cities.length = arrCities.length;
	for(var i = 0; i < arrCities.length; i++) {
		Cities.options[i].text	= arrCities[i];
		Cities.options[i].value	= i;
	}
}

function selectedCate()
{
	var selected = Types.options[Types.selectedIndex].value;
	selected = corresponding[selected];
	var arrSubtypes = (arrCategories[selected].Subtype).split("|");
	Subtypes.length = arrSubtypes.length;
	for(var i = 0; i < arrSubtypes.length; i++) {
		Subtypes.options[i].text	= arrSubtypes[i];
		Subtypes.options[i].value	= arrSubtypes[i];
	}
}

function init()
{
	Provinces.length = arrLocation.length;
	for (var i = 0; i < arrLocation.length; i++) {
		Provinces.options[i].text = arrLocation[i].Province;
		Provinces.options[i].value = i;
	}

	Types.length = arrCategories.length;
	for (i = 0; i < arrCategories.length; i++) {
		Types.options[i].text	= arrCategories[i].Type;
		Types.options[i].value	= arrCategories[i].Type;
	}
}
