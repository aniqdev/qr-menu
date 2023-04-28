<?php

function abort_if_lost($companyId)
{
	return abort_if(auth()->user()->company_id != $companyId, 403);
}