#######################################################
# DO NOT EDIT THIS FILE!                              #
#                                                     #
# It's auto-generated by symfony-cmf/dev-kit package. #
#######################################################

############################################################################
# This file is part of the Symfony CMF package.                            #
#                                                                          #
# (c) 2011-2017 Symfony CMF                                                #
#                                                                          #
# For the full copyright and license information, please view the LICENSE  #
# file that was distributed with this source code.                         #
############################################################################

ifeq ("symfony-cmf/content-bundle", "symfony-cmf/testing")
TESTING_SCRIPTS_DIR=bin
else
TESTING_SCRIPTS_DIR=vendor/symfony-cmf/testing/bin
endif
CONSOLE=${TESTING_SCRIPTS_DIR}/console
VERSION=dev-master
ifdef BRANCH
	VERSION=dev-${BRANCH}
endif
PACKAGE=symfony-cmf/content-bundle
list:
	@echo 'test:                    will run all tests'
	@echo 'unit_tests:               will run unit tests only'
	@echo 'functional_tests_phpcr:  will run functional tests with PHPCR'

	@echo 'test_installation:    will run installation test'
include ${TESTING_SCRIPTS_DIR}/make/unit_tests.mk
include ${TESTING_SCRIPTS_DIR}/make/functional_tests_phpcr.mk
include ${TESTING_SCRIPTS_DIR}/make/test_installation.mk

.PHONY: test
test: unit_tests functional_tests_phpcr
