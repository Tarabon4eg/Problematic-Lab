# Problematic-Lab
A repository for co-working on problematic pieces of code

## Problem: 
Exception #0 (Magento\Framework\Exception\LocalizedException): Invalid method Magento\Framework\View\Element\Template::subsStatusChange
#1 include() called at [vendor/magento/framework/View/TemplateEngine/Php.php:59]
        Screenshot file: ErrorScreenshot.png

## Description:
I tried to create an observer for my event which is dispatched from a block (ObsContentBlock.php).

## Files:
        Observer: \Observer\IndexActionPredispatch.php
        Block: \Block\ObsContentBlock.php
        Events Subscription: \etc\events.xml
