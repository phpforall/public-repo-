<?php
/**
 * @file
 * Contains \Drupal\siteinfo\Controller\JsonConverter.
 */

namespace Drupal\siteinfo\Controller;

use Drupal\Core\Controller\ControllerBase;

class JsonConverter extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */

public function jsonpagereturn($siteapikey,$nodeid)
{
/*get the configuration settings for siteinfo using container help*/
$config = \Drupal::config('siteinfo.settings');
/*serializer service to serialize a Drupal data type*/
$serializer = \Drupal::service('serializer'); 
/*check if site api key is valid and nodeid is not null and should be numeric only*/
if ($config->get('site-information.site_api_key') == $siteapikey && $nodeid != NULL && is_numeric($nodeid))
{

         if ($siteapikey != '' and $siteapikey != NULL ) 
            {
               /*check if node exists*/
                if ($node = node_load($nodeid)) 
                     {
                        /*check if node is published and content type is page*/
                         $status = $node->isPublished();
                         if($node->getType() == "page" && $status == 1)
                             {

                               /*converting node data to serialized form */
                                $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);

                                /*pass serialized data to response markup for page return element*/
                                   $element = array(
                                       '#markup' => $data ,
                                       );

                             }
                   
                     }
            } 

} 

else
{
/*access denied message will show up in returned markup if above conditions are not met*/
$element = array(
                      '#markup' =>  "access denied",
                   );
}


    return $element;

}


}
