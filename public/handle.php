<div class="joe_detail__agree">
    <div class="agree">
        <div class="icon">
            <svg class="icon-1" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="28" height="28">
                <path d="M736 128c-65.952 0-128.576 25.024-176.384 70.464-4.576 4.32-28.672 28.736-47.328 47.68L464.96 199.04C417.12 153.216 354.272 128 288 128 146.848 128 32 242.848 32 384c0 82.432 41.184 144.288 76.48 182.496l316.896 320.128C450.464 911.68 478.304 928 512 928s61.568-16.32 86.752-41.504l316.736-320 2.208-2.464C955.904 516.384 992 471.392 992 384c0-141.152-114.848-256-256-256z" fill="#fff" />
            </svg>
            <svg class="icon-2" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="28" height="28">
                <path d="M512 928c-28.928 0-57.92-12.672-86.624-41.376L106.272 564C68.064 516.352 32 471.328 32 384c0-141.152 114.848-256 256-256 53.088 0 104 16.096 147.296 46.592 14.432 10.176 17.92 30.144 7.712 44.608-10.176 14.432-30.08 17.92-44.608 7.712C366.016 204.064 327.808 192 288 192c-105.888 0-192 86.112-192 192 0 61.408 20.288 90.112 59.168 138.688l315.584 318.816C486.72 857.472 499.616 863.808 512 864c12.704.192 24.928-6.176 41.376-22.624l316.672-319.904C896.064 493.28 928 445.696 928 384c0-105.888-86.112-192-192-192-48.064 0-94.08 17.856-129.536 50.272l-134.08 134.112c-12.512 12.512-32.736 12.512-45.248 0s-12.512-32.736 0-45.248L562.24 196c48.32-44.192 109.664-68 173.76-68 141.152 0 256 114.848 256 256 0 82.368-41.152 144.288-75.68 181.696l-317.568 320.8C569.952 915.328 540.96 928 512 928z" fill="#fff" />
            </svg>
        </div>
        <span class="text"><?php _getAgree($this) ?></span>
    </div>

    <script language="javascript" type="text/javascript">
    	function zfb(){
            var obj=document.getElementById("ewm");
    	    obj.src=`<?php $this->options->ZNAlipay() ?>`;
    	};
    	function wx(){
            var obj=document.getElementById("ewm");
    	    obj.src=`<?php $this->options->ZNWeChat() ?>`;
    	};
	
	</script> 
    <div style="text-align: center; margin-left:30px; <?php if(Helper::options()->ZNPaySet !== 'on') echo 'display:none;' ?>">
        <div class="footer_flex">
            <svg t="1625851671591" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="870" width="200" height="200"><path d="M772.75834719 403.3543129c-0.44958115-0.00463486-32.42855073 0.97872734-41.30275726 2.7453804-14.29776191 2.84889221-36.36431694 7.50769614-62.30020522 12.39206314-11.32759094-61.37786865-77.24143982-108.63178253-157.02818872-108.91141891-80.96477509-0.28040886-147.97322273 47.90356636-158.26183318 110.53284645-34.99162673-6.60235405-63.98343086-13.27114105-77.53884316-16.50240899-5.31463623-1.26995086-21.02216721-2.05324173-21.0221672-2.05324173-0.28658867-0.00617981-0.78329087-0.01235962-1.34874345-0.0193119-1.13090515-0.00463486-2.53912926 0.00695228-3.10998915 0-55.1455307-0.18771172-80.42404175 35.79422951-80.5816269 81.2822628-0.0548458 16.86779023 4.98633384 32.55137444 13.65274429 45.63480377l107.61829376 163.59964371 0.22942544-0.05561828c13.91538621 25.54115295 40.97522735 42.94967651 72.15931891 43.09490204l0 0.01313208 300.04443169 1.03820802 0-0.33988953c28.37768555-2.19228744 52.68519401-18.708601 65.78021051-42.29229927l0.30435561 0.07338524 108.74147415-162.7823639c8.7652874-13.02858353 13.92156601-28.66890908 13.98259163-45.53515434C852.92747179 439.79201507 827.16925304 403.54279709 772.75834719 403.3543129L772.75834719 403.3543129zM420.18012682 372.63293457c11.61340713-9.23340798 25.24992942-16.51013374 40.53182603-21.6355133 16.19264603-5.41892051 33.45439911-8.14035415 51.29937171-8.07932854s35.08355141 2.90296554 51.23371125 8.43698501c15.25099754 5.22348404 28.83885383 12.59831428 40.38582802 21.91514969 17.85037995 14.40127373 29.14784431 32.19062805 32.69505501 51.10548019-43.16133499 7.30685234-91.6249466 13.67900849-131.67629243 13.53301049-35.62969208-0.12205124-78.52375031-5.44286728-117.94861792-11.97260856C389.84575908 406.14217949 401.4661185 387.52627563 420.18012682 372.63293457L420.18012682 372.63293457zM811.13341968 512.18616676c-0.02394676 0.03012657-0.04248619 0.06875038-0.06720543 0.10351182L704.73100344 671.47462082c-1.55576707 1.77437782-2.94545173 3.72488022-4.12502288 5.85459709-8.0708313 14.53568459-22.72238731 23.96839142-39.20702935 25.23834229-0.69213867 0.05330086-1.38504983 0.12668609-2.0640564 0.22479057l-294.62860107-1.02121354c-0.20547866-0.00386238-0.41250229-0.01004219-0.61875343-0.01004218-17.96007157-0.09269714-34.4508934-9.93867874-43.04700851-25.70569039-1.07451439-1.97444917-2.32592583-3.80367279-3.72797013-5.47994613L211.7714564 510.13292503c-0.01776695-0.02394676-0.0355339-0.05407333-0.06102562-0.09037971-5.33317566-8.06001663-8.13803673-17.43169785-8.10868263-27.10232735 0.03630638-10.65862656 1.99144363-25.48012733 11.07885361-35.54394722 7.55095481-8.36359978 19.67265129-12.57282257 36.04296684-12.51952171l1.26299858 0c0.57008743 0 1.25681877 0 1.8531704 0 0.10273933 0 0.194664 0 0.28504371 0 5.24820327 0.27422905 12.41600991 0.85126877 14.84467507 1.25295639 15.42789458 3.6738968 47.17589378 10.93208313 84.94997978 17.89827347 11.50371551 2.12044717 23.55434417 4.21540261 35.87920189 6.17131233 38.5820961 6.13423347 79.78752136 10.93208313 114.73588943 11.05413436 40.11237144 0.13363838 87.05188751-5.69160461 129.70184326-12.70568848 12.28777885-2.01693535 24.22330856-4.13738251 35.53931237-6.23851775 20.7239914-3.85156631 39.35920716-7.65369415 54.25795555-10.69029808 5.28450967-1.07605934 9.85834121-2.01075554 13.85513306-2.8071785 4.90754128-0.84431648 25.44922829-1.86475754 35.18011093-2.11890221 15.90682984 0.13363838 27.78828621 4.45796013 35.31992913 12.87022591 9.19632912 10.27779579 11.07885361 25.03054619 11.04872703 35.59338569C819.40045993 494.82244682 816.52684848 504.16863632 811.13341968 512.18616676L811.13341968 512.18616676zM811.13341968 512.18616676" fill="#ffffff" p-id="871"></path></svg>
            <div class="flex-footer">
            <img id="ewm" src="<?php $this->options->ZNWeChat() ?>" width="120px" height="120px">
            <div style="margin-top:5px;">
    		<label><input name="pay" type="radio" value="zfb" checked="checked" onclick="zfb()">支付宝</label>
    		<label style="margin-left:3px; display:block-inline"><input name="pay" type="radio" value="wx" onclick="wx()" checked>微信</label>
    		</div>
    		<div style="height:40px; background:rgba(0,0,0,0);"></div>
            </div>
        </div>
        <p style="margin-top:8px; color:#909399; font-size:12px">打赏</p>
    </div>
    
    <div style="<?php if(Helper::options()->Haibao !== 'on') echo 'display:none;' ?>">
        <div class="article-poster-button" style="text-align: center; margin-left:30px;">
            <div class="haibao">
                <svg t="1623158793415" class="icon-haibao" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2237" width="100%" height="100%"><path d="M512 0C230.4 0 0 230.4 0 512s230.4 512 512 512 512-230.4 512-512-230.4-512-512-512zM403.2 704L256 851.2c-12.8 12.8-32 12.8-44.8 0s-12.8-32 0-44.8l147.2-147.2c12.8-12.8 32-12.8 44.8 0s12.8 32 0 44.8z m460.8-44.8h-192c-12.8 19.2-76.8 102.4-115.2 153.6-19.2 25.6-51.2 25.6-70.4-12.8-25.6-70.4-64-172.8-64-172.8S307.2 576 236.8 544c-25.6-12.8-32-44.8 0-64C294.4 435.2 384 364.8 384 364.8s6.4-128 6.4-204.8c0-44.8 12.8-51.2 19.2-51.2 6.4 0 19.2 0 44.8 19.2 64 44.8 166.4 115.2 166.4 115.2s108.8-32 172.8-51.2c32-12.8 57.6 12.8 51.2 38.4l-51.2 204.8s64 89.6 102.4 153.6c19.2 38.4 6.4 70.4-32 70.4z" fill="#FF9256" p-id="2238"></path></svg>
            </div>
            <p style="margin-top:5px; color:#909399; font-size:12px">海报</p>
        </div>
        <div class="haibao-shade">
            <div class="ball-spin-fade-loader_title">正在生成.....</div>
            <div class="ball-spin-fade-loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div data-id="<?php echo $this->cid ?>" class="article-poster action action-poster" style="display:none;">
            <div class="poster-popover-mask" data-event="poster-close">
            </div>
            <div class="poster-popover-box">
                <a class="poster-download" data-event="poster-download" data-url="">下载海报</a>
                <img class="article-poster-images"/>
            </div>
        </div>
    </div>
</div>