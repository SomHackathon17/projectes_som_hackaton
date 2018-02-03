using UnityEngine;
using System.Collections;

public class ANT_Blackboard : MonoBehaviour
{
    public float maxSpeed = 30.0f;
    public float maxAcceleration = 90.0f;

    public float initialSeekWeight = 0.2f;
    public float seekWeightIncrement = 0.5f;
    public float distanceSmallEnough = 15.0f;
    public float enoughTimePassed = 15.0f;

    public float seedDistanceSmallEnough = 40.0f;
    public float seedRecollectionDistanceSmallEnough = 5.0f;

    public float nestDistanceSmallEnough = 5.0f;

    public GameObject locationA;
    public GameObject locationB;

    public GameObject nest;
    

	void Start () {

        if (locationA == null)
        {
            locationA = GameObject.Find("LOCATION_A");
            if (locationA == null)
                Debug.LogError("no LOCATION_A object found in " + this);
        }

        if (locationB == null)
        {
            locationB = GameObject.Find("LOCATION_B");
            if (locationB == null)
                Debug.LogError("no LOCATION_B object found in " + this);
        }

        if (nest == null)
        {
            nest = GameObject.Find("NEST");
            if (nest == null)
                Debug.LogError("no NEST object found in " + this);
        }

    }

}

