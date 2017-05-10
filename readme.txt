1.Go to admin/config/system/site-information

In this section we can add out site api key

Default input box will show up as "No site api key yet" and "Save Configuration" on submit button as default

Once we add the site api key, it will get saved and the submit button will now show "Update Configuration" instead of "Submit Configuration"


2.We have created an custom page link structure using routing.yml in which we have passed the site api key and node id for content type page

Url formation ex-:http://localhost/d8/page_json/dfsdcavfav/23

Here the site url is upto "http://localhost/d8/" after that we have our routing path page_json,siteapikey(dfsdcavfav)/and respective node id(23)


3.The above Url path returns the json output display for the particular node id belonging to the content type page
If the site key and node id are not validated ,the output response on page will show 'access denied' 

