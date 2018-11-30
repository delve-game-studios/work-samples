#!/usr/bin/env bash
set -e

rockety build:prod
git log --pretty=format:'%h' -n 1 > version

