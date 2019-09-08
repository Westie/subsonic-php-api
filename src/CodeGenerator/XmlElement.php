<?php


namespace OUTRAGElib\Subsonic\CodeGenerator;

use \DOMDocument;
use \SimpleXmlElement;
use \Symfony\Component\CssSelector\CssSelectorConverter;


class XmlElement extends SimpleXmlElement
{
	/**
	 *	Load HTML
	 */
	public static function loadHTML($html)
	{
		libxml_use_internal_errors(true);
		
		$html = str_replace("<wbr", "<br", (string) $html);
		$html = trim($html);
		
		$doc = new DOMDocument();
		
		$doc->strictErrorChecking = false;
		$doc->preserveWhiteSpace = false;
		$doc->loadHTML($html);
		
		libxml_use_internal_errors(false);
		
		return simplexml_import_dom($doc, static::class);
	}
	
	
	/**
	 *	Wrapper for CSS to XPath conversion/selection
	 */
	public function find($selector)
	{
		$expr = (new CssSelectorConverter())->toXPath($selector);
		
		return $this->xpath($expr);
	}
	
	
	/**
	 *	Retrieve an attribute
	 */
	public function attr($key)
	{
		return (string) $this->attributes()->{$key} ?? null;
	}
	
	
	/**
	 *	Get current element as text
	 */
	public function text()
	{
		return (string) $this;
	}
	
	
	/**
	 *	Get current element as innerHTML
	 */
	public function html()
	{
		$output = "";
		
		$doc = new DOMDocument("1.0", "UTF-8");
		$element = $doc->importNode(dom_import_simplexml($this), true);
		
		$doc->appendChild($element);
		
		foreach($doc->firstChild->childNodes as $child)
			$output .= $child->ownerDocument->saveHTML($child);
		
		return $output;
	}
	
	
	/**
	 *	Get current element as outerHTML
	 */
	public function outerHTML()
	{
		$output = "";
		
		$doc = new DOMDocument("1.0", "UTF-8");
		$element = $doc->importNode(dom_import_simplexml($this), true);
		$doc->appendChild($element);
		
		return $element->ownerDocument->saveHTML($element);
	}
}