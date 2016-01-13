#!/usr/bin/env python
import os, sys
from ConfigParser import ConfigParser, NoOptionError

configs = ConfigParser()
configs.read('build.ini')

tag = configs.get('global', 'tag')
verbose = configs.get('global', 'verbose') in ['True', 'true', 't', 'yes', 'y']
commit = configs.get('global', 'commit') in ['True', 'true', 't', 'yes', 'y']
ghpages = configs.get('global', 'gh-pages')

source = configs.get('apigen', 'source')

phar_dir = configs.get('phar', 'destination')

phar_command = "./createPhar.php %s %s/phpPGNv%s%s" % (source, phar_dir, tag, '.phar')

if verbose:
	phar_command = "%s -v" % phar_command

print('[' + sys.argv[0] + '] ' + phar_command + "\n" if verbose else ''),
rcode = os.system(phar_command)

if rcode != 0:
	print ("error trying to create the phar file...")
	sys.exit(1)

print('[' + sys.argv[0] + '] ' +  ("apigen generate --source %s --destination %s/api/%s\n" % (source, ghpages, tag) if verbose else '') ),
os.system("apigen generate --source %s --destination %s/api/%s" % (source, ghpages, tag))

print('[' + sys.argv[0] + '] ' + "./apiIndex.php %s/api > %s/api/index.html\n" % (ghpages, ghpages) if verbose else ''),
rcode = os.system("./apiIndex.php %s/api > %s/api/index.html" % (ghpages, ghpages))

print('[' + sys.argv[0] + '] ' + "./apiLatest.php %s > %s/api/latest/index.html\n" % (tag, ghpages) if verbose else ''),
rcode = os.system("./apiLatest.php %s > %s/api/latest/index.html" % (tag, ghpages))

if rcode != 0:
	print '[' + sys.argv[0] + '] ' + "error trying to create index.html"
	sys.exit(1)

print('[' + sys.argv[0] + '] ' + "git -C %s add api\n" % ghpages if verbose else ''),
os.system("git -C %s add api" % ghpages)

if commit:
	print('[' + sys.argv[0] + '] ' + 'git -C ' + ghpages + ' commit -m "Reporting build ' + tag + '"' + "\n" if verbose else ''),
	os.system('git -C ' + ghpages + ' commit -m "Reporting build ' + tag + '"')
	print '[' + sys.argv[0] + '] ' + "done!"
else:
	print('[' + sys.argv[0] + '] ' + 'done, but not committed!')
	