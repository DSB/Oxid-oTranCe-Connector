Oxid-oTranCe-Connector
======================

Connector which makes it possible to edit the currently visible texts in OXID's frontend via oTranCe.
First version tested with OXID 4.7.3_54408

You need:
- a working installation of OXID 4.7.3 or later
- a working installation of oTranCe 1.1.0 (currently this oTranCe version is not released but it will follow in a few days).

This connector adds an icon to each frontend page of OXID. If you click it you will be redirected to oTranCe.
After you succesfully logged in you see a list with all translation keys that are used on the page you've seen before in OXID.
The text displayed in OXID is carried to and displayed in oTranCe.
This way translators have the context in which translation keys are used.

Installation
============

- Copy the modules folder to your OXID installation.
- In OXID's backend admin go to Extensions/Module and click on the new entry "oTranCe Connector".
- Hit "activate".
- Click on tab "settings", "general" and provide the url of your oTranCe installation.
- Clear tmp-folder of OXID to force re-generation of the frontend cache files.

Now you can see the icon in the upper right corner of your shop installation.
Clicking on it will forward you to oTranCe. In the background the list of used language phrases is submitted to oTranCe.
Have fun with easier translating. ;)
