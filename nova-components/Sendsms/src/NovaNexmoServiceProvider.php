---------------------------------------------------------------------
## You Can Use This Query Parameter To Allow dynamic content.
---------------------------------------------------------------------
### Available Filters
---------------------------------------------------------------------
* lost => Filter For Lost Items Only
  * http://api.wajad.test/api/items?filter[lost]=true
---------------------------------------------------------------------
* found => Filter For Found Items Only
    * http://api.wajad.test/api/items?filter[found]=true 
---------------------------------------------------------------------
* category => Filter For All Items In Category With ID=1
    * http://api.wajad.test/api/items?filter[category]=1
Only Valid For One first ID  

---------------------------------------------------------------------
* brand => Filter For All Items In Brand With ID=1
    * http://api.wajad.test/api/items?filter[brand]=1
Only Valid For One first ID  

---------------------------------------------------------------------
* owner => Filter For All Items For User With ID=1
    * http://api.wajad.test/api/items?filter[owner]=1
Only Valid For One first ID

---------------------------------------------------------------------
* founder => Filter For All Items Founded By User With ID=1 _In Case Of Lost Item_
    * http://api.wajad.test/api/items?filter[founder]=1
Only Valid For One first ID  

---------------------------------------------------------------------
* item => Filter Only Single Item With ID=1
    * http://api.wajad.test/api/items?filter[item]=1
Only Valid For One first ID  

---------------------------------------------------------------------
* title => Filter Items With Keywords=_String_ In Title 
    * http://api.wajad.test/api/items?filter[title]=_string_
---------------------------------------------------------------------
* details => Filter Items With Keywords=_String_ In Details
    * http://api.wajad.test/api/items?filter[details]=_string_
---------------------------------------------------------------------
## Support Multi Filter
---------------------------------------------------------------------
* http://api.wajad.test/api/items?filter[category]=1&&filter[owner]=2
---------------------------------------------------------------------