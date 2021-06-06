<?php
/**
 * @file
 * Contains \Drupal\sitename_page_api\Controller\NodeAuthenticationController.
 */
namespace Drupal\sitename_page_api\Controller;

use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;


class NodeAuthenticationController{
    /**
     * @param $siteinfo_api_key - the API key parameter
     * @param NodeInterface $node - the node built from the node id parameter
     * @return JsonResponse
     */
	
		public function content($siteinfo_api_key, $nid){
			
			// Loads node object
			$node = Node::load($nid);
			
			// Site API Key configuration value
			$siteinfo_api_key_stored = \Drupal::config('siteapikey.configuration')->get('siteapikey');
			
			// Make sure the supplied node id is valid, content type is a page, the configuration key is set and matches the supplied key
			if (!empty($node) && $node->getType() == 'page' && $siteinfo_api_key_stored != 'No API Key yet' && $siteinfo_api_key_stored == $siteinfo_api_key){

            		// Displays the json representation of the node
            		return new JsonResponse($node->toArray(), 200, ['Content-Type'=> 'application/json']);
		}

			// Respond with access denied
			return new JsonResponse(array("error" => "Access Denied"), 403, ['Content-Type'=> 'application/json']);
		}
	}	
}
