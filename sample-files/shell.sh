#!/usr/bin/env bash

#
# Comment block 
#
# @param string $1
# First parameter.
#
# @param string $2
# Second parameter.
#
# @return void
function shellFunctionName() {
  local strVariable001='single quoted string as variable value'
  local strVariable002="double quoted string as variable value"

  declare -a array001=(one two three)
  declare -A assoc002=([key1]=value1 [key2]=value2 ["key3"]="value 3")
  assoc002["key4"]="another value"


  callFunction -o "arg1" "arg2" "arg3" --option "arg4"
  if [ "$?" != "0" ]; then
    return 1;
  fi


  local counter="5"
  local tgtFiles=$(find . -name "*_test.sh")
  for it in "${tgtFiles[@]}"; do
    ((counter++))
  done


  for ((i=1; i<="${#array001[@]}"; ++)); do
    echo -ne "print index $i \n\n"
  done

  for it in "${!assoc002[@]}"; do
    if [ "$it" == "one"]; then
      continue
    fi
    if [ "$it" == "three"]; then
      break
    fi

    echo "value of key \"${it}\" is \"${assoc002[$it]}\""
  done


  case "${strVariableDefinition}" in
    "case 1")
      echo "show case 1"
      ;;

    "case 2")
      echo "show case 2"
      ;;

    "case 3")
      echo "show case 3"
      ;;
  esac



  local executeInSubShell=$(< "${pathToFunctionManual}/name")
  local boolSelectedReturn=$(shellNS_array_has_value "arraySelectionedSectionNames" "r")


  #
  # Check parameter selection.
  if [ "${boolSelectedParameter}" == "1" ]; then
    shellNS_validate_param "${FUNCNAME[0]}" "?int[,]" "4" "arrAllowedSelectionedParans" "1" "${totalParamCount}" "${intSelectionParameterPositions}"
    if [ "$?" != "0" ]; then return 11; fi

    arraySelectionedParameters=("${SHELLNS_TYPES_LAST_VALIDATE_VALUES_LIST[@]}")
  fi


  if [ "${boolShowWithColor}" == "0" ]; then
    strManualHeader="** :: ${functionName} :: **"
    strManualFooter="** --- --- --- --- --- **"
  else
    strManualHeader="{{HEADER}} :: ${functionName} :: {{NONE}}"
    strManualFooter="{{FOOTER}} --- --- --- --- --- {{NONE}}"
  fi


  echo -ne "${strManualContent}"
  return "0"
}







cat <<EOF starting a heredoc example
and goes to another line.
EOF

grep "bash" <<< "This is a bash $varName example of herestring"


#
# Sample comment line
function sampleFunctionName() {
  local counter=5
  local strVariable001='single quoted string as variable value'
  local strVariable002="double quoted string as variable value"

  declare -a array001=(one two three)
  declare -A assoc002=([key1]=value1 [key2]=value2 ["key3"]="value 3")
  assoc002["key4"]="another value"

  ((counter++))

  callExternalFunction -o "arg1" "arg2" "arg3" --option "arg4"
  if [ "$?" != "0" ]; then
    return 1;
  fi

  executeInSubShell=$(< "${pathToFunctionManual}/name")
  callFunctionInSubShell=$(callExternalFunction "arraySelectionedSectionNames" "r")

  for it in "${!assoc002[@]}"; do
    if [ "$it" == "one"]; then
      continue
    fi
    if [ "$it" == "three"]; then
      break
    fi

    echo "value of key \"${it}\" is \"${assoc002[$it]}\""
  done

  case "${strVariableDefinition}" in
    "case 1")
      echo "show case 1"
      ;;

    "case 2")
      echo "show case 2"
      ;;
  esac

  strManual="** :: ${functionName} :: **"
  strManual="** --- --- --- --- --- **"
  strManual="{{HEADER}} :: ${functionName} :: {{NONE}}"
  strManual="{{FOOTER}} --- --- --- --- --- {{NONE}}"

  echo -ne "${strManual}"
  return "0"
}