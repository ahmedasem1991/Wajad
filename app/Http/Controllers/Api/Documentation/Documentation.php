<?php

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host="api.wajad.test",
 *     basePath="/api",
 *     @SWG\Info(
 *         version="2.0.0",
 *         title="WAJAD API DOC",
 *         description="This is API Doc For Wajad Application",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="a.abdou@smartappco.com"
 *         ),
 *     ),
 * )
 */

/**
 * @SWG\Post(
 *   path="/register",
 *   summary="Request For Register New User",
 *   tags={"Auth"},
 *   produces={"application/json"},
 *   @SWG\Parameter(
 *      name="name",
 *      in="query",
 *      description="Username",
 *      required=true,
 *      default="Abdelhammied",
 *      type="string"
 *    ),
 *    @SWG\Parameter(
 *      name="email",
 *      in="query",
 *      description="User Email Address",
 *      required=true,
 *      default="abdelhammied@gmail.com",
 *      type="string"
 *    ),
 *
 *    @SWG\Parameter(
 *      name="per_page",
 *      in="query",
 *      description="number of oject  showen per page - pagination default=2",
 *      required=false,
 *      type="integer"
 *    ),
 *   @SWG\Response(
 *         response=200,
 *          description="successful operation",
 *              @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={true},
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string"
 *              )
 *          ),
 *  ),
 *
 *  @SWG\Response(
 *       response=401,
 *       description="Unauthenticated",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={401}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Unauthenticated"}
 *              )
 *          ),
 *   ),
 *
 *
 *  *  @SWG\Response(
 *       response=489,
 *       description="Missing Token",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={489}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Missing Token"}
 *              )
 *          ),
 *   ),
 *
 *
 *  @SWG\Response(
 *       response=488,
 *       description="Invalid Token",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={488}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Invalid Token"}
 *              )
 *          ),
 *   ),
 *
 *
 *  @SWG\Response(
 *       response=484,
 *       description="Token Died",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={484}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Token Died"}
 *              )
 *          ),
 *   ),
 *
 *
 *  @SWG\Response(
 *       response=485,
 *       description="Token Expired",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={485}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Token Expired"}
 *              )
 *          ),
 *   ),
 *
 *  @SWG\Response(
 *       response=486,
 *       description="Missing refresh token",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={486}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Missing refresh token"}
 *              )
 *          ),
 *   ),
 *
 *  @SWG\Response(
 *       response=487,
 *       description="Invalid refresh Token",
 *           @SWG\Schema(
 *              type="object",
 *              @SWG\Property(
 *                  property="success",
 *                  type="boolean",
 *                  enum={false},
 *              ),
 *              @SWG\Property(
 *                  property="error_code",
 *                  type="Integer",
 *                   enum={487}
 *              ),
 *              @SWG\Property(
 *                  property="message",
 *                  type="string",
 *                  enum={"Invalid refresh Token"}
 *              )
 *          ),
 *   ),
 *
 * )
 *
 *
 * )
 *
 */
