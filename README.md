# Requests list #

#### GET /api/v1/game/start ####
* input:
    * vk_id 
    * hash
* output:
    * Serialized Village
    * Serialized Battles  
    OR 
    * No Village Exception
    

------------------------------------------
#### GET /api/v1/user/create ####
* input:
    * vk_id (int)
* output:
    * Serialized Village
    
    
#### POST /v1/user/new ####
* input:
    * vk_id (int)
    * village_name (string)
* output:
    * Serialized Village
    
--------------------------------   
# Error Codes #
1 - not_exist - пользователя не существует